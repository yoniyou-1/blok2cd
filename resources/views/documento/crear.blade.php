@extends("theme.$theme.layout")
@section('titulo')
Documento
@endsection

@section('styles')
<link href='{{asset("assets/js/bootstrap-fileinput/css/fileinput.min.css")}}' rel='stylesheet' type='text/css'/>
@endsection


@section('scriptsPlugins')
<script src='{{asset("assets/js/bootstrap-fileinput/js/fileinput.min.js")}}' type='text/javascript'></script>
<script src='{{asset("assets/js/bootstrap-fileinput/js/locales/es.js")}}' type='text/javascript'></script>
<script src='{{asset("assets/js/bootstrap-fileinput/themes/fas/theme.min.js")}}' type='text/javascript'></script>

@endsection

@section('scripts')
<script src='{{asset("assets/pages/scripts/documento/crear.js")}}' type='text/javascript'></script>
@endsection

@section('contenido')

<div class="row">
    <div class="col-md-12">
        @include('includes.form-error')
        @include('includes.mensaje')
        <div class="card card-primary card-info">
            <div class="card-header">
                <h3 class="card-title"> Crear Documento</h3>
            </div>
            <div class="card-tools pull-right">
                    <a href="{{route('documento')}}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                    </a>
             </div>
              <!-- /.card-header -->
              <!-- form start -->
        <form action="{{route('guardar_documento')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="card-body ">
                @include('documento.formulario')
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

