<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'Nombre :') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', ' Apellido:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>


<!-- Password Field -->
<div class="form-group col-sm-6">
    @if($editing)
    {!! Form::label('password', 'Contraseña (Dejar en blanco para no modificar):') !!}
    @else
    {!! Form::label('password', 'Contraseña') !!}
    @endif
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role_id', 'Rol asignado') !!}
    <select class="select2 form-control" id="role_id" name="role_id" >
         <option value="2" @if(isset($user) && $user->role_id == 2) selected @endif > Usuario Regular </option>
         <option value="6"  @if(isset($user) && $user->role_id == 6) selected @endif> Usuario Administrador </option>
      </select>
</div>

<input type="hidden" name="company_id" value="11">

<!-- Submit Field -->
<div class="form-group col-sm-12">
@if ($editing)
    {!! Form::submit('Editar', ['class' => 'btn btn-primary bg-red']) !!}

@else
    {!! Form::submit('Crear', ['class' => 'btn btn-primary bg-red']) !!}

@endif
    <a href="{!! route('users.index') !!}" class="btn btn-default bg-teal">Cancelar</a>
</div>
