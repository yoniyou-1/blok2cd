<div class="form-group row">
	<label for="name" class="col-lg-3 col-form-label requerido">Nombre</label>
	<div class="col-lg-8">
		<input type="text"  name="name" id="name" class="form-control" value="{{ old('name', $data->name ?? '') }}" required/>
	</div>
</div>

