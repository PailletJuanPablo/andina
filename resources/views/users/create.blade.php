@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Crear 
            @if (isset($movil))
                Móvil
            @else
                Usuario
            @endif
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    @if (isset($movil))

                    {!! Form::open(['route' => 'moviles.store']) !!}
                    @include('users.fields_movil', ['editing' => false])
                    {!! Form::close() !!}
                @else
                {!! Form::open(['route' => 'users.store']) !!}
                @include('users.fields', ['editing' => false])
                {!! Form::close() !!}


                @endif


                   
                </div>
            </div>
        </div>
    </div>
@endsection
