
@foreach ($datosdocumento as $documento)
                                
@endforeach
<head><meta http-equiv="Content-type: application/pdf" content="text/html; charset=utf-8"></head>
<!--div>{{$documento->id}}</div-->

            <div class=" row card-header">
                    
                     <!--a href="{{route('documento_ver_excel', ['id' => $documento->id])}}" class="btn btn-success">
                        <i class="fa fa-fw fa-book"></i> Exportar en Excel
                    </a>

                    <a href="{{route('documento_ver_excel0', ['id' => $documento->id])}}" class="btn btn-success">
                        <i class="fa fa-fw fa-book"></i> Exportar en Excel 0
                    </a>

                    <a href="{{route('documento_ver_excel2', ['id' => $documento->id])}}" class="btn btn-success">
                        <i class="fa fa-fw fa-book"></i> Exportar en Excel 2
                    </a-->

                    <a href="{{route('documento_ver_pdf', ['id' => $documento->id])}}" class="btn btn-success">
                        <i class="fa fa-fw fa-book"></i> Exportar en PDF
                    </a>
                
            </div>
            
            <div class="card-body table-responsive no-padding">
                            <!-- /.card-body -->
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>

                            <th>Tipo</th>
                            <th>Identificador</th>
                            <th>N-Control</th>
                            <th>Estado</th>
                            <th>Ref Ext</th>
                            <th>Tipo solicitud</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td>
                                @foreach ($documento->tipodocs as $tipodoc)
                                {{$loop->last ? $tipodoc->name : $tipodoc->name . ', '}}
                                @endforeach
                            </td>
                            <td>
                                {{$documento->identificador}}
                            </td>
                            <td>
                                {{$documento->ncontrol}}
                            </td>
                            <td>
                                @foreach ($documento->tipoestados as $tipoestado)
                                    {{$loop->last ? $tipoestado->name : $tipoestado->name . ', '}}
                                @endforeach
                            </td>
                            <td>
                                @foreach ($documento->refexternas as $refexterna)
                                    {{$loop->last ? $refexterna->name : $refexterna->name . ', '}}
                                @endforeach
                            </td>
                            <td>

                             {{$documento->tiposolicitud->name}}

                            </td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
                <!-- /.card-footer -->
            <div class="card-body table-responsive no-padding">
                            <!-- /.card-body -->
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th>Titulo</th>   
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                {{$documento->title}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
                <!-- /.card-footer -->

            <div class="modal-header">
                 <h4 class="modal-title">Matriz</h4>
            </div>
            <div class="card-body table-responsive no-padding">
                            <!-- /.card-body -->
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th>Pregunta</th>
                            <th class="width70"></th>
                            <th>Respuesta</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            @foreach ($documento->questions as $question)
                            <tr>
                            <td>
                                {{$question->name}}
                            </td>
                            <td class="width70"></td>
                            <td>
                                @if( $question->pivot->state == 1)
                                Cumple
                                @elseif ( $question->pivot->state == 2)
                                No Cumple
                                @elseif ( $question->pivot->state == 0)
                                No Aplica
                                @endif
                            </td>
                            </tr>
                            @endforeach
                        
                    </tbody>
                </table>
            </div>

            <div class="card-body table-responsive no-padding">
                            <!-- /.card-body -->
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th>observacion</th>   
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                {{$documento->observation}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
                <!-- /.card-footer -->

            <div class="modal-header">
                 <h4 class="modal-title">Fechas</h4>
            </div>

 @php($usuario = $documento->usuarios)

            <div class="card-body table-responsive no-padding">
                            <!-- /.card-body -->
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Tipo de Fecha</th>
                            <th>fecha ini</th>
                            <th>fechafin</th>

                        </tr>
                    </thead>
                    <tbody>
                    @if (count($documento->tipofechas) == 2)
                        @php($i = 1)
                        @foreach ($documento->tipofechas as $tipofecha)
                            
                                <tr>
                                     <td>
                                       {{$usuario[$i]->name}} {{$usuario[$i]->lastname}}
                                     </td>
                                     <td>
                                       {{$tipofecha->name}}<br>
                                     </td>
                                     <td>
                                       {{$tipofecha->pivot->fechaini}}
                                     </td>
                                     <td>
                                      {{$tipofecha->pivot->fechafin}}
                                     </td>
                                </tr>
                        @php($i = $i-1)
                        @endforeach
                    @else
                    @foreach ($documento->tipofechas as $tipofecha)
                                @php($i = $loop->iteration -1)
                                <tr>
                                     <td>
                                        {{$usuario[$i]->name}} {{$usuario[$i]->lastname}}
                                     </td>
                                     <td>
                                        {{$tipofecha->name}}
                                     </td>
                                     <td>
                                        {{$usuario[$i]->pivot->fechaini}}
                                     </td>
                                     <td>
                                        {{$usuario[$i]->pivot->fechafin}}
                                     </td>
                                </tr>
                    @endforeach
                   @endif
                    </tbody>
                </table>

            <div class="modal-header">
                 <h4 class="modal-title">Anexos</h4>
            </div>
<!--div>{{$documento->identificador}}</div>
<div>{{$documento->ncontrol}}</div>
<div>{{$documento->title}}</div>

	@foreach ($documento->questions as $question)
	<div>
		{{$loop->last ? $question->name : $question->name . ', '}}
    </div>
    @endforeach

<div>{{$documento->observation}}</div-->

<!-- Documento
<div><img style="width: 100%; height: auto; " src="{{Storage::url("imagenes/caratulas/$documento->foto")}}" alt="una Imagen del documento"></div>

<!--div><img style="width: 100%; height: auto;" src="{{Storage::url("imagenes/caratulas/aa.jpg")}}" alt="una Imagen del documentox"></div-->

<!--iframe width="100%" height="400" src="{{Storage::url('archivos/1/OP (JD)11.09.2020 C33386 Corregir Campo cuenta del cliente en el TDF011..pdf')}}" frameborder="0"></iframe-->

@foreach ($documento->files as $file)
	@if( $file->extension == 'pdf' || $file->extension == 'jpg' || $file->extension == 'png'|| $file->extension == 'jpeg' )
	<div>
		{{$loop->last ? $file->name : $file->name . ', '}}
    </div>
	
	  <iframe width="100%" height="400" src="{{Storage::url('archivos/'.$documento->id.'/'.$file->name)}}" frameborder="0"></iframe>  
	  <br>
	@else
	<div class="card-body table-responsive">
       <div class="form-group "> 
        <table class="table table-striped table-bordered table-hover" id="tabla-data">
            <thead id="thead">
            	<tr><td> 
            		{{$loop->last ? $file->name : $file->name . ', '}}
            	</td></tr>
            </thead>
            <tbody id="tbody">
            	<tr><td> 
            		<a href="{{Storage::url('archivos/'.$documento->id.'/'.$file->name)}}" download="Archivo">Descargar {{$file->name}}</a>
            	</td></tr>
            </tbody>
        </table>
       </div>
    </div>
	
	
	@endif

@endforeach