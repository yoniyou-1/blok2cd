
<div class="form-group row">
    <label for="user" class="col-lg-3 control-label requerido">Usuario</label>
    <div class="col-lg-8">
        <input type="text" name="user" id="user" class="form-control" value="{{old('user', $data->user ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
	<label for="dni" class="col-lg-3 col-form-label requerido">Cedula</label>
	<div class="col-lg-8">
		<input type="number"  name="dni" id="dni" class="form-control" value="{{ old('dni', $data->dni ?? '') }}" />
	</div>
</div>
<div class="form-group row">
	<label for="name" class="col-lg-3 col-form-label requerido">Nombre</label>
	<div class="col-lg-8">
		<input type="text"  name="name" id="name" class="form-control" value="{{ old('name', $data->name ?? '') }}" required/>
	</div>
</div>
<div class="form-group row">
	<label for="lastname" class="col-lg-3 col-form-label requerido">Apellido</label>
	<div class="col-lg-8">
		<input type="text"  name="lastname" id="lastname" class="form-control" value="{{ old('lastname', $data->lastname ?? '') }}" required/>
	</div>
</div>
<div class="form-group row">
    <label for="password" class="col-lg-3 control-label {{!isset($data) ? 'requerido' : ''}}">Contraseña</label>
    <div class="col-lg-8">
        <input type="password" name="password" id="password" class="form-control" value="" {{!isset($data) ? 'required' : ''}} minlength="6"/>
    </div>
</div>

<div class="form-group row">
    <label for="re_password" class="col-lg-3 control-label {{!isset($data) ? 'requerido' : ''}}">Repita Contraseña</label>
    <div class="col-lg-8">
        <input type="password" name="re_password" id="re_password" class="form-control" value="" {{!isset($data) ? 'required' : ''}} minlength="6"/>
    </div>
</div>

<div class="form-group row">
    <label for="rol_id" class="col-lg-3 control-label requerido">Rol</label>
    <div class="col-lg-8">
        <select name="rol_id" id="rol_id" class="form-control" required>
            <option value="">Seleccione el rol</option>
            @foreach($rols as $id => $name)
                <option value="{{$id}}" {{old("rol_id", $data->roles[0]->id ?? "") == $id ? "selected" : ""}}>{{$name}}</option>
            @endforeach
        </select>
    </div>
</div>