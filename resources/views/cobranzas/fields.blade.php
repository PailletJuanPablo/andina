<!-- Operation Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('operation_date', 'Fecha :') !!}
    {!! Form::date('operation_date', null, ['class' => 'form-control','id'=>'operation_date']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#operation_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Destination Dni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('destination_dni', 'Dni:') !!}
    {!! Form::text('destination_dni', null, ['class' => 'form-control']) !!}
</div>



<!-- Ammount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ammount', 'Monto:') !!}
    {!! Form::number('ammount', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>




<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Origin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('origin', 'Origen:') !!}
    {!! Form::text('origin', null, ['class' => 'form-control']) !!}
</div>

<!-- Destination Field -->
<div class="form-group col-sm-6">
    {!! Form::label('destination', 'Destino:') !!}
    {!! Form::text('destination', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cobranzas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
