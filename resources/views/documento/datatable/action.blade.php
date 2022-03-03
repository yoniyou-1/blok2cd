	  <a href="{{route('ver_documento', ['documento' => $id])}}" class=" ver-documento btn-accion-tabla tooltipsC"  title="ver este registro">
	  	<i class="fa fa-fw fa-book"></i>
	  </a>

	  <a href="{{route('editar_documento', ['id' => $id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
	  	<i class="fa fa-fw fa-circle"></i>
	  </a>
	  <form action="{{route('eliminar_documento', ['id' => $id])}}" class="d-inline form-eliminar" method="POST">
	  	@csrf @method("delete")
	  	<button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro">
	  		<i class="fa fa-fw fa-trash text-danger"></i>
	  	</button>
	  </form>