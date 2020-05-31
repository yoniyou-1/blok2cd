@extends("theme.$theme.layout")
@section('titulo')
Permisos
@endsection
@section('contenido')

<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<h3 class="card-title">Permisos</h3>
				<div class="card-body table-responsive p-0">
					<table class="table table-bordered table-hover text-wrap table-striped">
						<thead>                  
							<tr>
								<th style="width: 10px">Id</th>
								<th>nombre</th>
								<th>slug</th>
								<th style="width: 40px">Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($permissions as $permission)
							<tr>
								<td>{{$permission->id }}</td>
								<td>{{$permission->name }}</td>
								<td>{{$permission->slug }}</td>
								<td>Editar/eliminar</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection


