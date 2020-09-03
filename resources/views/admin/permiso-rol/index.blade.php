@extends("theme.$theme.layout")
@section("titulo")
Permiso - Rol
@endsection

@section("scripts")
<script src='{{asset("assets/pages/scripts/admin/permiso-rol/index.js")}}' type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensaje')
        <div class="card card-success">
            <div class="card-header with-border">
                <h3 class="card-title">Permisos - Rol</h3>
            </div>
            <div class="card-body">
                @csrf
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th>Permiso</th>
                            @foreach ($rols as $id => $name)
                            <th class="text-center">{{$name}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $key => $permission)
                            <tr>
                                <td class="font-weight-bold">{{$permission["name"]}}</td>
                                @foreach($rols as $id => $name)
                                    <td class="text-center">
                                        <input
                                        type="checkbox"
                                        class="permissions_roles"
                                        name="permission_roles[]"
                                        data-permisoid={{$permission["id"]}}
                                        value="{{$id}}" {{in_array($id, array_column($permissionsRols[$permission["id"]], "id"))? "checked" : ""}}>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection