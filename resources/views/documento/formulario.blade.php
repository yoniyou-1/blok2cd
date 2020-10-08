<div class="form-group">
    <label for="tipo_document_id" class="col-lg-3 control-label">Tipo</label>
    <div class="col-lg-8">
    <input type="text" name="tipo_document_id" id="tipo_document_id" class="form-control" value="{{old('tipo_document_id', $data->tipo_document_id ?? '')}}"/>
    </div>
</div>
<div class="form-group">
    <label for="identificador" class="col-lg-3 control-label requerido">Identificador</label>
    <div class="col-lg-8">
    <input type="text" name="identificador" id="identificador" class="form-control" value="{{old('identificador', $data->identificador ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="ncontrol" class="col-lg-3 control-label requerido">Nro de Control</label>
    <div class="col-lg-8">
    <input type="text" name="ncontrol" id="ncontrol" class="form-control" value="{{old('ncontrol', $data->ncontrol ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="title" class="col-lg-3 control-label requerido">Título</label>
    <div class="col-lg-8">
    <input type="text" name="title" id="title" class="form-control" value="{{old('title', $data->title ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="tipo_solicitud" class="col-lg-3 control-label requerido">Tipo de Solicitud</label>
    <div class="col-lg-8">
    <input type="text" name="tipo_solicitud" id="tipo_solicitud" class="form-control" value="{{old('tipo_solicitud', $data->tipo_solicitud ?? '')}}" required/>
    </div>
</div>
<!--div class="form-group">
    <label for="cantidad" class="col-lg-3 control-label requerido">Cantidad</label>
    <div class="col-lg-8">
    <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{old('cantidad', $data->cantidad ?? '')}}" required/>
    </div>
</div-->
<div class="form-group">
    <label for="observation" class="col-lg-3 control-label requerido">Observacion</label>
    <div class="col-lg-8">
    <input type="text" name="observation" id="observation" class="form-control" value="{{old('observation', $data->observation ?? '')}}" required/>
    </div>
</div>
<!--div class="form-group">
    <label for="editorial" class="col-lg-3 control-label">Editorial</label>
    <div class="col-lg-8">
    <input type="text" name="editorial" id="editorial" class="form-control" value="{{old('editorial', $data->editorial ?? '')}}"/>
    </div>
</div-->
<div class="form-group">
    <label for="estado" class="col-lg-3 control-label requerido">Estado</label>
    <div class="col-lg-8">
    <input type="text" name="estado" id="estado" class="form-control" value="{{old('estado', $data->estado ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="foto" class="col-lg-3 control-label">Foto</label>
    <div class="col-lg-5">
        <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($data->imagen) ? Storage::url("imagenes/caratulas/$data->imagen") : "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Caratula+Libro"}}" accept="image/*"/>
    </div>
</div>