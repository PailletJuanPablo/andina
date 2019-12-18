<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('id', 'Identificador único:') !!}
            <p>{!! $cobranza->id !!}</p>
        </div>
    </div>

    <div class="col-md-4">
        <!-- Operation Date Field -->
        <div class="form-group">
            {!! Form::label('operation_date', 'Registrado:') !!}
            <p>{!! $cobranza->operation_date->format('d-m-Y') !!} a las {!! $cobranza->operation_date->format('h:m') !!}
            </p>

        </div>
    </div>


    <div class="col-md-4">
        <!-- Operation Date Field -->
        <div class="form-group">
            {!! Form::label('ammount', 'Monto:') !!}
            <p>$ {!! $cobranza->ammount !!}</p>
        </div>

    </div>

</div>

<div class="row">

    <div class="col-md-4">
        <!-- Name Field -->
        <div class="form-group">
            {!! Form::label('name', 'Beneficiario:') !!}
            <p>{!! $cobranza->name !!}</p>
        </div>

    </div>


    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('destination_dni', 'Dni:') !!}
            <p>{!! $cobranza->destination_dni !!}</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('sign', 'Firma:') !!}
            <img class="img-fluid" src="{{$cobranza->sign}}">
        </div>
    </div>

</div>



<div class="row">

    <div class="col-md-3">
        <!-- Name Field -->
        <div class="form-group">
            {!! Form::label('name', 'Ceco:') !!}
            <p>{!! $cobranza->ceco ? $cobranza->ceco->title : 'Sin Asignar' !!}</p>
        </div>

    </div>


    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('destination_dni', 'Responsable:') !!}
            <p>{!! $cobranza->responsable->first_name !!} {!! $cobranza->responsable->last_name !!}</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('origin', 'Origen:') !!}
            <p>{!! $cobranza->origin !!}</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('destination_dni', 'Destino:') !!}
            <p>{!! $cobranza->destination !!}</p>
        </div>
    </div>
</div>