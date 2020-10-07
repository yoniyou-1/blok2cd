<div class="form-group">
    <label for="tipo_id" class="col-lg-3 control-label">tipo</label>
    <div class="col-lg-8">
    <input type="text" name="tipo_id" id="tipo_id" class="form-control" value="{{old('tipo_id', $data->tipo_id ?? '')}}"/>
    </div>
</div>
<div class="form-group">
    <label for="isbn" class="col-lg-3 control-label requerido">Identificador</label>
    <div class="col-lg-8">
    <input type="text" name="isbn" id="isbn" class="form-control" value="{{old('isbn', $data->isbn ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="isbn" class="col-lg-3 control-label requerido">Nro de control</label>
    <div class="col-lg-8">
    <input type="text" name="isbn" id="isbn" class="form-control" value="{{old('isbn', $data->isbn ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="titulo" class="col-lg-3 control-label requerido">Título</label>
    <div class="col-lg-8">
    <input type="text" name="titulo" id="titulo" class="form-control" value="{{old('titulo', $data->titulo ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="autor" class="col-lg-3 control-label requerido">tipo de solisitud</label>
    <div class="col-lg-8">
    <input type="text" name="autor" id="autor" class="form-control" value="{{old('autor', $data->autor ?? '')}}" required/>
    </div>
</div>
<!--div class="form-group">
    <label for="cantidad" class="col-lg-3 control-label requerido">Cantidad</label>
    <div class="col-lg-8">
    <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{old('cantidad', $data->cantidad ?? '')}}" required/>
    </div>
</div-->
<div class="form-group">
    <label for="titulo" class="col-lg-3 control-label requerido">Observacion</label>
    <div class="col-lg-8">
    <input type="text" name="titulo" id="titulo" class="form-control" value="{{old('titulo', $data->titulo ?? '')}}" required/>
    </div>
</div>
<!--div class="form-group">
    <label for="editorial" class="col-lg-3 control-label">Editorial</label>
    <div class="col-lg-8">
    <input type="text" name="editorial" id="editorial" class="form-control" value="{{old('editorial', $data->editorial ?? '')}}"/>
    </div>
</div-->
<div class="form-group">
    <label for="titulo" class="col-lg-3 control-label requerido">estado</label>
    <div class="col-lg-8">
    <input type="text" name="titulo" id="titulo" class="form-control" value="{{old('titulo', $data->titulo ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="foto" class="col-lg-3 control-label">Foto</label>
    <div class="col-lg-5">
        <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($data->imagen) ? Storage::url("imagenes/caratulas/$data->imagen") : "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Caratula+Libro"}}" accept="image/*"/>
    </div>
</div>