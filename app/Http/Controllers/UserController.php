<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Hash;
use Response;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->all(['role_id' => '2']);
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();


        $user = new User();
        $deleted =  User::withTrashed()
        ->where('email', $request->email)
        ->first();
        if($deleted) {
            $deleted->restore();
            $user = $deleted;
        }

        $user->fill($request->except('password'));

        if($request->password && $request->password != '') {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        
        Flash::success('Usuario creado.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $user->fill($request->except('password'));

        if($request->password && $request->password != '') {
            $user->password = Hash::make($request->password);
        }
        $user->save();


        Flash::success('Usuario actualizado');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }


    public function moviles(Request $request)
    {
        $users = $this->userRepository->all(['role_id' => 3]);
        return view('users.index')->with('users', $users)->with('moviles', true);
    }

    public function createMovil(Request $request) {
        return view('users.create')->with('movil', true);

    }

    public function storeMovil(Request $request) {
        $movil = new User();
        $movil->first_name = 'Movil';
        $movil->last_name = $request->last_name;
        $movil->password = $request->chapa;
        $movil->role_id = 3;
        $movil->identificator = $request->last_name;
        $movil->chapa = $request->chapa;
        $movil->save();
        return redirect(route('moviles'));


    }
   
}
