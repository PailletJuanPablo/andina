@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Editar Usuario
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

                        @include('users.fields', ['editing' => true])

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection