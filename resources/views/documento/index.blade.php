@extends("theme.$theme.layout")
@section('titulo')
Documentos
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/documento/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')

<div class="row">
	<div class="col-md-12">
        @csrf
		@include('includes.mensaje')
		<div class="card card-primary card-warning">
			<div class="card-header with-border">
				<h3 class="card-title">Documentos</h3>
			</div>
			 <div class="card-tools pull-right">
                    <a href="{{route('crear_documento')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
              </div>
			<!-- /.card-header -->
			
			<div class="card-body table-responsive no-padding">
				<!-- /.card-body -->
				<table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Tipo</th>
                            <th>Preguntas</th>
                            <th>Fechas</th>
                            <th>Fechas</th>
                            <th>Nombre Fecha</th>
                            <th>Estado</th>
                            <th>Ref Ext</th>
                            <th>Identificador</th>
                            <th>N-Control</th>
                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td><a href="{{route('ver_documento', $data)}}" class="ver-documento">{{$data->title}}</a></td>
                            <td>
                                @foreach ($data->tipodocs as $tipodoc)
                                    {{$loop->last ? $tipodoc->name : $tipodoc->name . ', '}}
                                @endforeach
                            </td>
                            <td>
                                @foreach ($data->questions as $question)
                                    {{$loop->last ? $question->pivot->state : $question->pivot->state . ', '}}
                                @endforeach
                            </td>
                             <td>
                                @foreach ($data->usuarios as $usuario)
                                    {{$loop->last ? $usuario->pivot->state : $usuario->pivot->state . ', '}}
                                @endforeach
                            </td>
                            <td>
                                @foreach ($data->usuarios as $usuario)
                                    {{$loop->last ? $usuario->pivot->state : $usuario->pivot->state . ', '}}
                                @endforeach
                            </td>
                            <td>
                                @foreach ($data->tipofechas as $tipofecha)
                                    {{$loop->last ? $tipofecha->name : $tipofecha->name . ', '}}
                                @endforeach
                            </td>
                            <td>
                                @foreach ($data->tipoestados as $tipoestado)
                                    {{$loop->last ? $tipoestado->name : $tipoestado->name . ', '}}
                                @endforeach
                            </td>
                            <td>
                                @foreach ($data->refexternas as $refexterna)
                                    {{$loop->last ? $refexterna->name : $refexterna->name . ', '}}
                                @endforeach
                            </td>
                            <td>{{$data->identificador}}</td>
                            <td>{{$data->ncontrol}}</td>
                            <td>
                                <a href="{{route('editar_documento', ['id' => $data->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                    <i class="fa fa-fw fa-circle"></i>
                                </a>
                                <form action="{{route('eliminar_documento', ['id' => $data->id])}}" class="d-inline form-eliminar" method="POST">
                                    @csrf @method("delete")
                                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro">
                                        <i class="fa fa-fw fa-trash text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
			</div>
				<!-- /.card-footer -->

			</div>
		</div>
	</div>
<!-- /.Modal -->
<div class="modal fade" id="modal-ver-documento" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title">Documento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
	@endsection


