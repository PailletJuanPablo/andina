@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">  @if (isset($moviles))
            Móviles

            @else
         Usuarios
            @endif</h1>
        <h1 class="pull-right">

            @if (isset($moviles))
            <a class="btn btn-primary pull-right bg-red" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('moviles.create') !!}"> Añadir Nuevo </a>


            @else
            <a class="btn btn-primary pull-right bg-red" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('users.create') !!}"> Añadir Nuevo </a>

            @endif


        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @if (isset($moviles))
                @include('users.table_moviles')

                @else
                @include('users.table')

                @endif
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

