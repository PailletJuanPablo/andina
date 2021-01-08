<!-- First Name Field -->

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', ' Número Móvil:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('chapa', ' Chapa:') !!}
    {!! Form::text('chapa', null, ['class' => 'form-control']) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
@if ($editing)
    {!! Form::submit('Editar', ['class' => 'btn btn-primary bg-red']) !!}

@else
    {!! Form::submit('Crear', ['class' => 'btn btn-primary bg-red']) !!}

@endif
    <a href="{!! route('moviles') !!}" class="btn btn-default bg-teal">Cancelar</a>
</div>
