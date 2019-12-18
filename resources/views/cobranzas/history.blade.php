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
                        <select class="form-control" name="month" id="month">
                            <option value="1"> Enero </option>
                            <option value="2"> Febrero </option>
                            <option value="3"> Marzo </option>
                            <option value="4"> Abril </option>
                            <option value="5"> Mayo </option>
                            <option value="6"> Junio </option>
                            <option value="7"> Julio </option>
                            <option value="8"> Agosto </option>
                            <option value="9"> Septiembre </option>
                            <option value="10"> Octubre </option>
                            <option value="11"> Noviembre </option>
                            <option value="12"> Diciembre </option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="year"> Año </label>

                        <select class="form-control" name="year" id="year">
                            <option value="2019"> 2019 </option>
                            <option value="2018"> 2018 </option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="period"> Período </label>

                        <select class="form-control" name="period" id="period">
                            <option value="1"> Primer período de liquidación </option>
                            <option value="2"> Segundo período de liquidación </option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="ceco"> CECO </label>

                        <select class="form-control" name="ceco" id="ceco">
                            <option value="all"> Todos </option>
                            @foreach (Auth::user()->getCecos() as $ceco)
                        <option value="{{$ceco->id}}"> {{$ceco->title}} </option>
                            @endforeach
                          
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