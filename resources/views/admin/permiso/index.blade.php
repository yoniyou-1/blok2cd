


@extends("theme.$theme.layout")
@section('titulo')
Menus
@endsection

@section("scripts")
<script src='{{asset("assets/pages/scripts/admin/index.js")}}' type="text/javascript"></script>
@endsection

@section('contenido')

<div class="row">
	<div class="col-md-12">
		@include('includes.mensaje')
		<div class="card card-primary card-info">
			<div class="card-header with-border">
				<h3 class="card-title">Permisos</h3>
			</div>
			 <div class="card-tools pull-right">
                    <a href="{{route('crear_permiso')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
              </div>
			<!-- /.card-header -->
			
			<div class="card-body table-responsive no-padding">
				<!-- /.card-body -->
				<table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Slug</th>
                            <th class="width70"></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            
                            <td>{{$permission->id }}</td>
							<td>{{$permission->name }}</td>
							<td>{{$permission->slug }}</td>
                            <td>
                                <a href="{{route('editar_permiso', ['id' => $permission->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                    <i class="fa fa-fw fa-circle"></i>
                                </a>
                                <form action="{{route('eliminar_permiso', ['id' => $permission->id])}}" class="d-inline form-eliminar" method="POST">
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

	@endsection


