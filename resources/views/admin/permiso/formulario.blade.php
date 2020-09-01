<div class="form-group row">
	<label for="name" class="col-lg-3 col-form-label requerido">Nombre</label>
	<div class="col-lg-8">
		<input type="text"  name="name" id="name" class="form-control" value="{{ old('name', $permission->name ?? '') }}" required/>
	</div>
</div>

<div class="form-group row">
	<label for="slug" class="col-lg-3 col-form-label requerido">Slug</label>
	<div class="col-lg-8">
		<input type="text"  name="slug" id="slug" class="form-control" value="{{ old('slug', $permission->slug ?? '') }}" required/>
	</div>
</div>

