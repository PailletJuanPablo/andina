<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', 'Country:') !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<!-- Agrup Site Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agrup_site', 'Agrup Site:') !!}
    {!! Form::text('agrup_site', null, ['class' => 'form-control']) !!}
</div>

<!-- Site Field -->
<div class="form-group col-sm-6">
    {!! Form::label('site', 'Site:') !!}
    {!! Form::text('site', null, ['class' => 'form-control']) !!}
</div>

<!-- Rep Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rep', 'Rep:') !!}
    {!! Form::text('rep', null, ['class' => 'form-control']) !!}
</div>

<!-- Unidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unidad', 'Unidad:') !!}
    {!! Form::text('unidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Legajo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('legajo', 'Legajo:') !!}
    {!! Form::text('legajo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('mlClients.index') !!}" class="btn btn-default">Cancel</a>
</div>
