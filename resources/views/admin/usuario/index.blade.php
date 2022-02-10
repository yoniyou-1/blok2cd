@extends("theme.$theme.layout")
@section('titulo')
Usuarios
@endsection


@section('styles')
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"/>
<style type="text/css"> 

tfoot {
    display: table-header-group;
}
</style>
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

<script> 

$(document).ready(function() {

// Setup - add a text input to each footer cell
    $('#tabla-data tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control form-control-sm" placeholder="'+title+'" aria-controls="tabla-data"  />');
    } );

    var table = $('#tabla-data').DataTable({
        "scrollX": true,
        "serverSide": true,
        "responsive": true,
        "fixedHeader": true,

        "order": [[ 0, "desc" ]],
        "bProcessing": true,
        "ajax": "{{route('usuario')}}",
        
        "columns": [
            
            {data: 'id', name: 'id'},
            {data: 'user', name: 'user'},
            {data: 'name', name: 'name'},
            {data:  'roles.name', name: 'roles.name'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action'},
        ],
        language: {
                    "decimal": ",",
                    "thousands": ".",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sSearch": "Buscar:",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast":"Último",
                        "sNext":"Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "sProcessing":"Cargando..."
                },

        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });



});




</script>
@endsection

@section('contenido')

<div class="row">
	<div class="col-md-12">
		@include('includes.mensaje')
		<div class="card card-primary card-info">
			<div class="card-header with-border">
				<h3 class="card-title">Usuarios</h3>
			</div>
			 <div class="card-tools pull-right">
                    <a href="{{route('crear_usuario')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
              </div>
			<!-- /.card-header -->
			
			<div class="card-body table-responsive no-padding">
				<!-- /.card-body -->
				<table class="table table-striped table-bordered table-hover" id="tabla-data">

                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Rol</th>
                            <th>fech_creacion</th>
                           
                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Rol</th>
                            <th>fech_creacion</th>
                           
                            <td class="width70"></td>
                        </tr>
                    </tfoot>
                </table>
			</div>
				<!-- /.card-footer -->

			</div>
		</div>
	</div>

	@endsection

