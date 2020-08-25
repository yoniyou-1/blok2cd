

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
                <h3 class="card-title"> Editar Menu</h3>
            </div>
            <div class="card-tools pull-right">
                    <a href="{{route('menu')}}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                    </a>
            </div>
              <!-- /.card-header -->
              <!-- form start -->
        <form action="{{ route('actualizar_menu', ['id' => $data->id])}}"class="form-horizontal" id="form-general" method="POST" autocomplete="off">
            @csrf @method("put")
            <div class="card-body ">
                @include('admin.menu.formulario')
            </div>
                <!-- /.card-body -->
            <div class=" row card-footer">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    @include('includes.boton-form-editar')
                </div>
            </div>
                <!-- /.card-footer -->
        </form>
        </div>
    </div>
</div>

@endsection


