<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Nombre:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'Responsable') !!}
    <select class="select2 form-control" id="user_id" name="user_id" >
            @foreach ($users as $user)                                     
                 <option value="{{$user->id}}">{{$user? $user->first_name : '' }} {{$user ? $user->last_name : ''}}</option>
            @endforeach
      </select>
</div>

<!-- Company Id Field -->
    {!! Form::hidden('company_id', 5, ['class' => 'form-control']) !!}


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('companyMetas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
