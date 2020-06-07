@extends("theme.$theme.layout")
@section('titulo')
Menus
@endsection


@section('scripts')
<script src='{{asset("assets/pages/scripts/admin/menu/crear.js")}}' type='text/javascript'></script>
@endsection

@section('contenido')

<div class="row">
	<div class="col-md-12">
		@include('includes.form-error')
		@include('includes.mensaje')
		<div class="card card-primary card-info">
			<div class="card-header">
				<h3 class="card-title"> Crear Menu</h3>

			</div>
			  <!-- /.card-header -->
              <!-- form start -->
		<form action="{{ route('guardar_menu') }}"class="form-horizontal" id="form-general" method="POST" autocomplete="off">
			@csrf
			<div class="card-body ">
				@include('admin.menu.formulario')
			</div>
                <!-- /.card-body -->
            <div class=" row card-footer">
	            <div class="col-lg-3"></div>
	            <div class="col-lg-6">
	            	@include('includes.boton-form-crear')
	            </div>
            </div>
                <!-- /.card-footer -->
		</form>
		</div>
	</div>
</div>

@endsection


