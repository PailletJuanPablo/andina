<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyMetaRequest;
use App\Http\Requests\UpdateCompanyMetaRequest;
use App\Repositories\CompanyMetaRepository;
use App\Http\Controllers\AppBaseController;
use App\User;
use Illuminate\Http\Request;
use Flash;
use Response;

class CompanyMetaController extends AppBaseController
{
    /** @var  CompanyMetaRepository */
    private $companyMetaRepository;

    public function __construct(CompanyMetaRepository $companyMetaRepo)
    {
        $this->companyMetaRepository = $companyMetaRepo;
    }

    /**
     * Display a listing of the CompanyMeta.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $companyMetas = $this->companyMetaRepository->all(['company_id' => 9]);

        return view('company_metas.index')
            ->with('companyMetas', $companyMetas);
    }

    /**
     * Show the form for creating a new CompanyMeta.
     *
     * @return Response
     */
    public function create()
    {
        $data['users'] = User::where('company_id', 9)->get();
        return view('company_metas.create', $data);
    }

    /**
     * Store a newly created CompanyMeta in storage.
     *
     * @param CreateCompanyMetaRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyMetaRequest $request)
    {
        $input = $request->all();

        $input->company_id = 9;
        $companyMeta = $this->companyMetaRepository->create($input);

        Flash::success('Guardado correctamente');

        return redirect(route('companyMetas.index'));
    }

    /**
     * Display the specified CompanyMeta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyMeta = $this->companyMetaRepository->find($id);

        if (empty($companyMeta)) {
            Flash::error('No se encontró');

            return redirect(route('companyMetas.index'));
        }

        return view('company_metas.show')->with('companyMeta', $companyMeta);
    }

    /**
     * Show the form for editing the specified CompanyMeta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyMeta = $this->companyMetaRepository->find($id);


        if (empty($companyMeta)) {
            Flash::error('No se encontró');

            return redirect(route('companyMetas.index'));
        }
        $data['users'] = User::where('company_id', 9)->get();
        $data['companyMeta'] = $companyMeta;
        return view('company_metas.edit', $data);
    }

    /**
     * Update the specified CompanyMeta in storage.
     *
     * @param int $id
     * @param UpdateCompanyMetaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyMetaRequest $request)
    {
        $companyMeta = $this->companyMetaRepository->find($id);

        if (empty($companyMeta)) {
            Flash::error('No se encontró');

            return redirect(route('companyMetas.index'));
        }

        $companyMeta = $this->companyMetaRepository->update($request->all(), $id);

        Flash::success('Correcto.');

        return redirect(route('companyMetas.index'));
    }

    /**
     * Remove the specified CompanyMeta from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyMeta = $this->companyMetaRepository->find($id);

        if (empty($companyMeta)) {
            Flash::error('No se encontró');

            return redirect(route('companyMetas.index'));
        }

        $this->companyMetaRepository->delete($id);

        Flash::success('Correcto');

        return redirect(route('companyMetas.index'));
    }
}
