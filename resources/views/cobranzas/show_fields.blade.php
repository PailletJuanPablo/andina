<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('id', 'Identificador:') !!}
            <p>{!! $cobranza->id !!}</p>
        </div>
    </div>

    <div class="col-md-2">
        <!-- Operation Date Field -->
        <div class="form-group">
            {!! Form::label('operation_date', 'Fecha y hora:') !!}
            <p>{!! $cobranza->formatted() !!}
            </p>

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

   
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('referent', 'Referente:') !!}
            <p>{!! $cobranza->referent !!}</p>
        </div>
    </div>





</div>

<div class="row">

    <div class="col-md-2">
        <!-- Operation Date Field -->
        <div class="form-group">
            {!! Form::label('user_id', 'Móvil:') !!}
            <p> {!! $cobranza->user ? $cobranza->user->identificator : '' !!}</p>
        </div>
    </div>

    <div class="col-md-3">
        <!-- Name Field -->
        <div class="form-group">
            {!! Form::label('name', 'Nombre pasajero:') !!}
            <p>{!! $cobranza->name !!}</p>
        </div>

    </div>


    @if ($cobranza->email)
        <div class="col-md-2">
            <!-- Operation Date Field -->
            <div class="form-group">
                {!! Form::label('email', 'Email Pasajero:') !!}
                <p>{!! $cobranza->email !!}</p>
            </div>
        </div>
    @endif

    @if ($cobranza->ceco_name)
        <div class="col-md-2">
            <!-- Operation Date Field -->
            <div class="form-group">
                {!! Form::label('ceco_name', 'Ceco:') !!}
                <p> {!! $cobranza->ceco_name !!}</p>
            </div>
        </div>
    @endif


    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('destination_dni', 'Legajo / DNI:') !!}
            <p>{!! $cobranza->destination_dni !!}</p>
        </div>
    </div>


</div>

<div class="row">
    @if ($cobranza->ammount)
    <div class="col-md-2">
        <!-- Operation Date Field -->
        <div class="form-group">
            {!! Form::label('ammount', 'Importe:') !!}
            <p>$ {!! $cobranza->ammount !!}</p>
        </div>
    </div>
@endif

@if ($cobranza->peaje)
    <div class="col-md-2">
        <!-- Operation Date Field -->
        <div class="form-group">
            {!! Form::label('peaje', 'Peaje:') !!}
            <p>$ {!! $cobranza->peaje !!}</p>
        </div>
    </div>
@endif

@if ($cobranza->espera)
    <div class="col-md-2">
        <!-- Operation Date Field -->
        <div class="form-group">
            {!! Form::label('espera', 'Espera:') !!}
            <p>$ {!! $cobranza->espera !!}</p>
        </div>
    </div>
@endif


@if ($cobranza->adicional)
    <div class="col-md-2">
        <!-- Operation Date Field -->
        <div class="form-group">
            {!! Form::label('adicional', 'Adicional:') !!}
            <p>$ {!! $cobranza->adicional !!}</p>
        </div>
    </div>
@endif

@if ($cobranza->total)
    <div class="col-md-2">
        <!-- Operation Date Field -->
        <div class="form-group">
            {!! Form::label('total', 'Total:') !!}
            <p>$ {!! $cobranza->total !!}</p>
        </div>
    </div>
@endif

@if ($cobranza->responsable)
        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('destination_dni', 'Responsable asignado:') !!}
                <p>{!! $cobranza->responsable->first_name !!} {!! $cobranza->responsable->last_name !!}</p>
            </div>
        </div>
    @endif


</div>

@if ($cobranza->sign)
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('sign', 'Adjunto') !!}
            <img class="img-fluid" style="max-width: 95%" src="{{ $cobranza->sign }}">
        </div>
    </div>


</div>
@endif


<div class="row">



    



    <div class="col-md-12">
        <form method="post" action="{{ route('cobranzaComments', $cobranza->id) }}">
            @csrf
            <div class="form-group">
                <label for="comments">Agregar Observaciones</label>
                <textarea class="form-control" name="comments" id="comments"
                    rows="3"> {{ $cobranza->comments }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary bg-red text-white"> Guardar </button>
        </form>
    </div>


</div>
