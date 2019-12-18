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
            @endif
        </div>
        <!-- /.box-body -->
    </div>
</section>

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
@endsection