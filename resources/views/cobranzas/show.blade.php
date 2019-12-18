@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cobranza
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('cobranzas.show_fields')
                    <a href="{!! route('cobranzas.index') !!}" class="btn bg-red">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
