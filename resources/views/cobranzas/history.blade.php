@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="box box-default">
        <div class="box-header with-border bg-blue">

            <h3 class="box-title">{{isset($title) ? $title : 'Gestión Cobranzas'}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if (isset($description))
            {!! $description !!}
            @else
            <strong> ¿Cómo funciona </strong>
            Seleccionar mes, año y período correspondiente y presione buscar para obtener los resultados filtrados
            @endif
        </div>
        <!-- /.box-body -->
    </div>
</section>
<section class="content-header">
    <div class="box box-default">
        <div class="box-header with-border bg-blue">

            <h3 class="box-title">Ver histórico</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form>
                <div class="form-row">

                    <div class="col-md-4">
                        <label for="month"> Mes </label>
                        <select class="form-control" name="month" id="month" >

                            <option value="1" @if(isset($month) && $month == '1') selected @endif> Enero </option>
                            <option value="2" @if(isset($month) && $month == '2') selected @endif> Febrero </option>
                            <option value="3" @if(isset($month) && $month == '3') selected @endif> Marzo </option>
                            <option value="4" @if(isset($month) && $month == '4') selected @endif> Abril </option>
                            <option value="5" @if(isset($month) && $month == '5') selected @endif> Mayo </option>
                            <option value="6" @if(isset($month) && $month == '6') selected @endif> Junio </option>
                            <option value="7" @if(isset($month) && $month == '7') selected @endif> Julio </option>
                            <option value="8" @if(isset($month) && $month == '8') selected @endif> Agosto </option>
                            <option value="9" @if(isset($month) && $month == '9') selected @endif> Septiembre </option>
                            <option value="10" @if(isset($month) && $month == '10') selected @endif> Octubre </option>
                            <option value="11" @if(isset($month) && $month == '11') selected @endif> Noviembre </option>
                            <option value="12" @if(isset($month) && $month == '12') selected @endif > Diciembre </option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="year"> Año </label>

                        <select class="form-control" name="year" id="year" value="{{old('year')}}">
                            <option value="2021" @if(isset($year) && $year == '2021') selected @endif> 2021 </option>
                            <option value="2020" @if(isset($year) && $year == '2020') selected @endif> 2020 </option>
                            <option value="2019" @if(isset($year) && $year == '2019') selected @endif> 2019 </option>
                            <option value="2018" @if(isset($year) && $year == '2018') selected @endif> 2018 </option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="period"> Período </label>

                        <select class="form-control" name="period" id="period" >
                            <option value="1" @if(isset($period) && $period == '1') selected @endif> Primer período de liquidación </option>
                            <option value="2" @if(isset($period) && $period == '2') selected @endif> Segundo período de liquidación </option>
                        </select>
                    </div>

                    <div class="col-md-2" style="margin-top: 15px">
                        <button type="submit" class="btn btn-primary bg-red mt-5"> Buscar </button>
                    </div>

                </div>
            </form>
        </div>
        <!-- /.box-body -->
    </div>
</section>
@isset($cobranzas)
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            @include('cobranzas.table')
        </div>
    </div>
    <div class="text-center">

    </div>
</div>
@endisset

@endsection
