@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Editar CECO {{$companyMeta->title}}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($companyMeta, ['route' => ['companyMetas.update', $companyMeta->id], 'method' => 'patch']) !!}

                        @include('company_metas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection