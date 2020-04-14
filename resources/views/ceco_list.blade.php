@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-yellow">
                <div class="box-header ">
                    <h3 class="box-title"> Seleccionar CECO </h3>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="box box-solid box-primary">

                <div class="box-body">
                    @foreach (Auth::user()->getCecos() as $ceco)
                    <div class="col-md-6 " style="padding: 3px">
                        <a href="{{route('vouchersByCeco', $ceco->id)}}">

                            <div class="small-box bg-red">
                                <div class="inner text-center">
                                    <p style="margin: auto">{{$ceco->title}}</p>
                                </div>
                            </div>
                        </a>

                    </div>


                    @endforeach
                </div>
            </div>

        </div>

    
    </div>





</div>




@endsection