@extends('layouts.app')

@section('content')
<div class="content">
  <div class="row">
      <div class="col-md-12">
          <div class="box box-solid box-yellow">
              <div class="box-header ">
                <h3 class="box-title"> Hola, {{Auth::user()->first_name}} </h3>
              </div>
            </div>
      </div>

     
      <div class="col-md-12">
        @include('lasts')
      </div>
  </div>

  


  
</div>




@endsection