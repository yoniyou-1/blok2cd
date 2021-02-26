@extends("theme.$theme.layout")
@section("titulo")
Referencia Externa - Tipo de documento
@endsection

@section("scripts")
<script src='{{asset("assets/pages/scripts/admin/refexterna-tipodoc/index.js")}}' type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensaje')
        <div class="card card-success">
            <div class="card-header with-border">
                <h3 class="card-title">Referencia Externa - Tipo de documento</h3>
            </div>
            <div class="card-body table-responsive">
                @csrf
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th>Referencia Externa</th>
                            @foreach ($tipodocs as $id => $name)
                            <th class="text-center">{{$name}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($refexternas as $key => $refexterna)
                            <tr>
                                <td class="font-weight-bold">{{$refexterna["name"]}}</td>
                                @foreach($tipodocs as $id => $name)
                                    <td class="text-center">
                                        <input
                                        type="checkbox"
                                        class="refexternas_tipodocs"
                                        name="refexterna_tipodocs[]"
                                        data-refexternaid={{$refexterna["id"]}}
                                        value="{{$id}}" {{in_array($id, array_column($refexternastipodocs[$refexterna["id"]], "id"))? "checked" : ""}}>
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