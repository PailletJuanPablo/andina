@extends('layouts.app')
u807970725_rai
@section('content')
<section class="content-header">
    <div class="box box-default">
        <div class="box-header with-border bg-blue">

            <h3 class="box-title">Gestión CECOS</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <strong> ¿Cómo funciona </strong>
            En esta sección se podrán administrar los diferentes CECOS.


        </div>
        <!-- /.box-body -->
            <h1 class="pull-right">
           <a class="btn btn-primary pull-right bg-blue text-white" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('companyMetas.create') !!}">Añadir Nuevo  </a>
        </h1>
    </div>
</section>
<div class="content">
    <div <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            @include('company_metas.table')
        </div>
    </div>
    <div class="text-center">

    </div>
</div>
@endsection