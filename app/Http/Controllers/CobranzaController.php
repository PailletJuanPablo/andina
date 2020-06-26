<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCobranzaRequest;
use App\Http\Requests\UpdateCobranzaRequest;
use App\Repositories\CobranzaRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Cobranza;
use App\Models\CompanyMeta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class CobranzaController extends AppBaseController
{
    /** @var  CobranzaRepository */
    private $cobranzaRepository;

    public function __construct(CobranzaRepository $cobranzaRepo)
    {
        $this->cobranzaRepository = $cobranzaRepo;
    }

    /**
     * Display a listing of the Cobranza.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Listado de Vouchers';
        $startOfMonth = Carbon::now()->firstOfMonth();
        $halfOfMonth = Carbon::now()->firstOfMonth()->addDays(15);

        $from = Carbon::now()->lessThan($halfOfMonth) ? $startOfMonth : $halfOfMonth;
        $to = Carbon::now()->lessThan($halfOfMonth) ? $halfOfMonth : Carbon::now()->lastOfMonth();

        $cobranzas = Cobranza::
            where('company_id', env('COMPANY_ID', 10))
            ->whereBetween('operation_date', [$from, $to])
            ->orderBy('operation_date', 'DESC')
            ->get();
        $data['cobranzas'] = $cobranzas;

        $data['description'] = 'Pertencientes a la liquidación del período ' . $from->format('d-m-Y') . ' a ' . $to->format('d-m-Y');


        return view('cobranzas.index', $data);
    }

    /**
     * Show the form for creating a new Cobranza.
     *
     * @return Response
     */
    public function create()
    {
        return view('cobranzas.create');
    }

    /**
     * Store a newly created Cobranza in storage.
     *
     * @param CreateCobranzaRequest $request
     *
     * @return Response
     */
    public function store(CreateCobranzaRequest $request)
    {
        $input = $request->all();

        $cobranza = $this->cobranzaRepository->create($input);

        Flash::success('Cobranza saved successfully.');

        return redirect(route('cobranzas.index'));
    }

    /**
     * Display the specified Cobranza.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cobranza = $this->cobranzaRepository->find($id);

        if (empty($cobranza)) {
            Flash::error('Cobranza not found');

            return redirect(route('cobranzas.index'));
        }

        return view('cobranzas.show')->with('cobranza', $cobranza);
    }

    /**
     * Show the form for editing the specified Cobranza.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cobranza = $this->cobranzaRepository->find($id);

        if (empty($cobranza)) {
            Flash::error('Cobranza not found');

            return redirect(route('cobranzas.index'));
        }

        return view('cobranzas.edit')->with('cobranza', $cobranza);
    }

    /**
     * Update the specified Cobranza in storage.
     *
     * @param int $id
     * @param UpdateCobranzaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCobranzaRequest $request)
    {
        $cobranza = $this->cobranzaRepository->find($id);

        if (empty($cobranza)) {
            Flash::error('Cobranza not found');

            return redirect(route('cobranzas.index'));
        }

        $cobranza = $this->cobranzaRepository->update($request->all(), $id);

        Flash::success('Cobranza updated successfully.');

        return redirect(route('cobranzas.index'));
    }

    /**
     * Remove the specified Cobranza from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cobranza = $this->cobranzaRepository->find($id);

        if (empty($cobranza)) {
            Flash::error('Cobranza not found');

            return redirect(route('cobranzas.index'));
        }

        $this->cobranzaRepository->delete($id);

        Flash::success('Cobranza deleted successfully.');

        return redirect(route('cobranzas.index'));
    }

    public function vouchers($ceco)
    {
        $ceco = CompanyMeta::find($ceco);
        $cobranzas = $this->cobranzaRepository->all(['ceco_id' => $ceco]);
        $data['cobranzas'] = $cobranzas;
        $data['title'] = 'Vouchers de Ceco ' . $ceco->title;

        return view('cobranzas.index', $data);
    }

    public function vouchersByCeco($ceco)
    {
        $ceco = CompanyMeta::find($ceco);

        $data['title'] = 'Vouchers de Ceco ' . $ceco->title;
        $startOfMonth = Carbon::now()->firstOfMonth();
        $halfOfMonth = Carbon::now()->firstOfMonth()->addDays(15);
        $from = Carbon::now()->lessThan($halfOfMonth) ? $startOfMonth : $halfOfMonth;
        $to = Carbon::now()->lessThan($halfOfMonth) ? $halfOfMonth : Carbon::now()->lastOfMonth();


        $cobranzas = Cobranza::where('ceco_id', $ceco->id)
        ->where('company_id', env('COMPANY_ID', 10))
            ->whereBetween('operation_date', [$from, $to])
            ->orderBy('operation_date', 'DESC')
            ->get();
        $data['cobranzas'] = $cobranzas;

        $data['description'] = 'Pertencientes a la liquidación del período ' . $from->format('d-m-Y') . ' a ' . $to->format('d-m-Y');

        return view('cobranzas.index', $data);
    }

    public function periodo(Request $request)
    {
        $data['title'] = 'Vouchers de período';
        if ($request->has('month') && $request->has('year') && $request->has('period')) {
            $year = $request->query('year');
            $month = $request->query('month');

            $from = Carbon::createFromFormat('d-m-Y', "1-$month-$year");
            $to = Carbon::createFromFormat('d-m-Y', "1-$month-$year")->addDays(15);

            if ($request->query('period') == 2) {
                $from = Carbon::createFromFormat('d-m-Y', "15-$month-$year");
                $to = Carbon::createFromFormat('d-m-Y', "15-$month-$year")->lastOfMonth();
            }

            $cobranzas = Cobranza::whereBetween('operation_date', [$from, $to])

            ->orderBy('operation_date', 'DESC');

            if ($request->has('ceco')) {
                if ($request->query('ceco') != 'all') {
                    $cobranzas->where('ceco_id', $request->query('ceco'));
                }
            }
            $data['cobranzas'] = $cobranzas
            ->where('employee_id', Auth::user()->id)
            ->where('company_id', env('COMPANY_ID', 10))
            ->get();
        }




        return view('cobranzas.history', $data);
    }

    public function getCecoList()
    {
        return view('ceco_list');
    }

    public function old(Request $request)
    {
        $data['title'] = 'Vouchers período anterior';
        $startOfMonth = Carbon::now()->firstOfMonth();
        $halfOfMonth = Carbon::now()->firstOfMonth()->addDays(15);
        $from = Carbon::now()->lessThan($halfOfMonth) ? Carbon::now()->firstOfMonth()->subDays(15) : Carbon::now()->firstOfMonth();
        $to = Carbon::now()->lessThan($halfOfMonth) ? Carbon::now()->firstOfMonth() : Carbon::now()->firstOfMonth()->addDays(15);

        if(Auth::user()->role_id == 6) {
            $cobranzas = Cobranza::
            where('company_id', env('COMPANY_ID', 10))
            ->whereBetween('operation_date', [$from, $to])
            ->orderBy('operation_date', 'DESC')
            ->get();
        } else {
             $cobranzas = Cobranza::
        where('company_id', env('COMPANY_ID', 10))->
             where('employee_id', Auth::user()->id)
             ->
            whereBetween('operation_date', [$from, $to])
            ->orderBy('operation_date', 'DESC')
            ->get();
        }

        $data['cobranzas'] = $cobranzas;

        $data['description'] = 'Pertencientes a la liquidación del período ' . $from->format('d-m-Y') . ' a ' . $to->format('d-m-Y');


        return view('cobranzas.index', $data);
    }

    public function all(Request $request)
    {
        $data['title'] = 'Listado de todos los vouchers';
        $data['description'] = 'Esta sección permite visualizar un histórico de todos los vouchers registrados, sin importar limitación por CECO asginado';

        if ($request->has('month') && $request->has('year') && $request->has('period')) {
            $year = $request->query('year');
            $month = $request->query('month');

            $data['year'] = $request->query('year');
            $data['month'] = $request->query('month');


            $from = Carbon::createFromFormat('d-m-Y', "1-$month-$year");
            $to = Carbon::createFromFormat('d-m-Y', "1-$month-$year")->addDays(14);



            if ($request->query('period') == 2) {
                $from = Carbon::createFromFormat('d-m-Y', "14-$month-$year");
                $to = Carbon::createFromFormat('d-m-Y', "15-$month-$year")->lastOfMonth();
            }

            $cobranzas = Cobranza::whereBetween('operation_date', [$from, $to])->where('company_id', env('COMPANY_ID', 10))
            ->orderBy('operation_date', 'DESC');

            if ($request->has('ceco')) {
                $data['selectedCeco'] = $request->query('ceco');
            }
            if ($request->query('ceco') != 'all') {
                $data['cobranzas'] = $cobranzas->where('ceco_id', $request->query('ceco'))->get();
            } else {
                $data['cobranzas'] = $cobranzas->whereNotNull('ceco_id')->get();
            }
        }

        return view('cobranzas.history', $data);
    }

    public function changeStatus($id, Request $request)
    {
        $cobranza = Cobranza::find($id);
        $cobranza->status = $request->status;
        $cobranza->save();
        return redirect()->back();
    }

    public function comments($id, Request $request)
    {
        $cobranza = Cobranza::find($id);
        $cobranza->comments = $request->comments;
        $cobranza->save();
        return redirect()->back();
    }
}
