<!-- Operation Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('operation_date', 'Operation Date:') !!}
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
    {!! Form::label('destination_dni', 'Destination Dni:') !!}
    {!! Form::text('destination_dni', null, ['class' => 'form-control']) !!}
</div>

<!-- Sign Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('sign', 'Sign:') !!}
    {!! Form::textarea('sign', null, ['class' => 'form-control']) !!}
</div>

<!-- Ammount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ammount', 'Ammount:') !!}
    {!! Form::number('ammount', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company Id:') !!}
    {!! Form::number('company_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Employee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    {!! Form::number('employee_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Origin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('origin', 'Origin:') !!}
    {!! Form::text('origin', null, ['class' => 'form-control']) !!}
</div>

<!-- Destination Field -->
<div class="form-group col-sm-6">
    {!! Form::label('destination', 'Destination:') !!}
    {!! Form::text('destination', null, ['class' => 'form-control']) !!}
</div>

<!-- Ceco Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ceco_id', 'Ceco Id:') !!}
    {!! Form::number('ceco_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cobranzas.index') !!}" class="btn btn-default">Cancel</a>
</div>
