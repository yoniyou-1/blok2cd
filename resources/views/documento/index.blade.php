@extends("theme.$theme.layout")
@section('titulo')
Documentos
@endsection


@section('styles')
<!--link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"/-->
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/documento/index.js")}}" type="text/javascript"></script>
<!--script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script-->
<!--script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script-->
<script> 



$(document).ready(function() {

// Setup - add a text input to each footer cell
    $('#tabla-data tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control form-control-sm" placeholder="'+title+'" aria-controls="tabla-data"  />');
    } );

    var table = $('#tabla-data').DataTable({

        "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {$('td:eq(0)', nRow).html(iDisplayIndexFull +1);},

        "scrollX": true,
        "serverSide": true,
        "responsive": true,
        "fixedHeader": true,
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Mostrar Todo"] ],
        "order": [[ 0, "desc" ]],
        "bProcessing": true,
        "ajax": "{{route('documento')}}",
        //, "searchable": false
        "columns": [
            
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'identificador', name: 'identificador'},
            {data: 'ncontrol', name: 'ncontrol'},
            //{data:  'roles.name', name: 'roles.name'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action'},
        ],
        "dom": 'lfrtipB',
        "buttons": [
            'copy', 'csv', 'excel', 'pdf', 'print'
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

              <div class="card-tools pull-right">
                    <a href="{{route('documento_index_excel')}}" class="btn btn-outline-info btn-block btn-sm">
                        <i class="fa fa-fw fa-book"></i> Exportar Lista de Documentos Excel
                    </a>
              </div>
			<!-- /.card-header -->
			
			<div class="card-body table-responsive no-padding">
				<!-- /.card-body -->
				<table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <td>Nro</td>
                            <th>Titulo</th>
                            <th>Identificador A</th>
                            <th>Identificador B</th>
                            <th>fec</th>
                            <!--th>Preguntas</th>
                            <th>Fechas</th>
                            <th>Fechas</th>
                            <th>Nombre Fecha</th
                            <th>Estado</th>
                            <th>Ref Ext</th>-->
                            

                            
                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Nro</td>
                            <th>Titulo</th>
                            <th>Identificador A</th>
                            <th>Identificador B</th>
                            <th>fec</th>
                            <!--th>Preguntas</th>
                            <th>Fechas</th>
                            <th>Fechas</th>
                            <th>Nombre Fecha</th
                            <th>Estado</th>
                            <th>Ref Ext</th>-->

                            <td class="width70"></td>
                        </tr>
                    </tfoot>
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


