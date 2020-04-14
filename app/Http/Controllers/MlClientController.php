<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMlClientRequest;
use App\Http\Requests\UpdateMlClientRequest;
use App\Repositories\MlClientRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MlClientController extends AppBaseController
{
    /** @var  MlClientRepository */
    private $mlClientRepository;

    public function __construct(MlClientRepository $mlClientRepo)
    {
        $this->mlClientRepository = $mlClientRepo;
    }

    /**
     * Display a listing of the MlClient.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $mlClients = $this->mlClientRepository->all([], 0, 100);

        return view('ml_clients.index')
            ->with('mlClients', $mlClients);
    }

    /**
     * Show the form for creating a new MlClient.
     *
     * @return Response
     */
    public function create()
    {
        return view('ml_clients.create');
    }

    /**
     * Store a newly created MlClient in storage.
     *
     * @param CreateMlClientRequest $request
     *
     * @return Response
     */
    public function store(CreateMlClientRequest $request)
    {
        $input = $request->all();

        $mlClient = $this->mlClientRepository->create($input);

        Flash::success('Ml Client saved successfully.');

        return redirect(route('mlClients.index'));
    }

    /**
     * Display the specified MlClient.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mlClient = $this->mlClientRepository->find($id);

        if (empty($mlClient)) {
            Flash::error('Ml Client not found');

            return redirect(route('mlClients.index'));
        }

        return view('ml_clients.show')->with('mlClient', $mlClient);
    }

    /**
     * Show the form for editing the specified MlClient.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mlClient = $this->mlClientRepository->find($id);

        if (empty($mlClient)) {
            Flash::error('Ml Client not found');

            return redirect(route('mlClients.index'));
        }

        return view('ml_clients.edit')->with('mlClient', $mlClient);
    }

    /**
     * Update the specified MlClient in storage.
     *
     * @param int $id
     * @param UpdateMlClientRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMlClientRequest $request)
    {
        $mlClient = $this->mlClientRepository->find($id);

        if (empty($mlClient)) {
            Flash::error('Ml Client not found');

            return redirect(route('mlClients.index'));
        }

        $mlClient = $this->mlClientRepository->update($request->all(), $id);

        Flash::success('Ml Client updated successfully.');

        return redirect(route('mlClients.index'));
    }

    /**
     * Remove the specified MlClient from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mlClient = $this->mlClientRepository->find($id);

        if (empty($mlClient)) {
            Flash::error('Ml Client not found');

            return redirect(route('mlClients.index'));
        }

        $this->mlClientRepository->delete($id);

        Flash::success('Ml Client deleted successfully.');

        return redirect(route('mlClients.index'));
    }
}
