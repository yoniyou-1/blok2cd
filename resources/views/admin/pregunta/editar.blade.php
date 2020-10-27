@extends("theme.$theme.layout")
@section('titulo')
    Preguntas
@endsection

@section("scripts")
<script src='{{asset("assets/pages/scripts/admin/pregunta/crear.js")}}' type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.mensaje')
        <div class="card card-danger card-info">
            <div class="card-header with-border">
                <h3 class="card-title">Editar Pregunta</h3>
            </div>
                <div class="card-tools pull-right">
                    <a href="{{route('pregunta')}}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                    </a>
                </div>

            <form action="{{route('actualizar_pregunta', ['id' => $data->id])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                @csrf @method("put")
                <div class="card-body">
                    @include('admin.pregunta.formulario')
                </div>
                <div class="card-footer">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        @include('includes.boton-form-editar')
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> 
@endsection