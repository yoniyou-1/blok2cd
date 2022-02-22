@extends("theme.$theme.layout")
@section('titulo')
Documento
@endsection

@section('styles')
<link href='{{asset("assets/js/bootstrap-fileinput/css/fileinput.min.css")}}' rel='stylesheet' type='text/css'/>
<link rel='stylesheet' href='{{asset("assets/pages/scripts/documento/crear.css")}}'>
@endsection


@section('scriptsPlugins')
<script src='{{asset("assets/js/bootstrap-fileinput/js/fileinput.min.js")}}' type='text/javascript'></script>
<script src='{{asset("assets/js/bootstrap-fileinput/js/locales/es.js")}}' type='text/javascript'></script>
<script src='{{asset("assets/js/bootstrap-fileinput/themes/fas/theme.min.js")}}' type='text/javascript'></script>

@endsection

@section('scripts')
<script src='{{asset("assets/pages/scripts/documento/editar.js")}}' type='text/javascript'></script>




    <script> var objetoFiles = [];
            var urlfilearray = [];
    </script>
     @foreach ($data->files as $file)
    <script>

        urlfilearray.push( "{{Storage::url('archivos/'.$data->id.'/'.$file->name)}}",);
        var urlfile = "{{Storage::url('archivos/'.$data->id.'/'.$file->name)}}";
        var namefile = "{{$file->name}}";
        var extensionfile = "{{$file->extension}}";
        var idfile = "{{$file->id}}";
        if(extensionfile == 'jpg' || extensionfile == 'png' || extensionfile == 'jpeg' ){
             objetoFiles.push (  { caption: namefile, url: urlfile, key: idfile, downloadUrl: urlfile },);
        }else{
        objetoFiles.push (  {type: extensionfile,  caption: namefile, url: urlfile, key: idfile, downloadUrl: urlfile },);
    }
    //alert("{{$file->name}}");
    </script>
     @endforeach

  <script>var urla = ["{{Storage::url('archivos/'.$data->id.'/aa.pdf')}}",
                    "{{Storage::url('archivos/'.$data->id.'/bb.pdf')}}"];

     /*console.log(urlfilearray);
     console.log(urla);*/

    /*var uraque = [{ url : "{{Storage::url('archivos/'.$data->id.'/aa.pdf')}}"},
     {url : "{{Storage::url('archivos/'.$data->id.'/bb.pdf')}}"}];

var myJsonString = JSON.parse(JSON.stringify(uraque));
  console.log(myJsonString);*/
    //console.log(urla);


//console.log(objetoFiles);

var hh = [
            {type: "pdf", url: "{{Storage::url('archivos/'.$data->id.'/aa.pdf')}}", }, // disable download
            {type: "pdf", url: "{{Storage::url('archivos/'.$data->id.'/bb.pdf')}}", },
        ];
  //console.log(hh);


  </script>   


<script> 

   /* $('#file').fileinput({



        language: 'es',
        allowedFileExtensions: ['jpg', 'jpeg', 'png', 'pdf'],
        //maxFileSize: 5000,
        maxFileCount: 5,
        showUpload: false,
        showClose: false,
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        theme: "fas",
    });*/

               //'http://localhost:8000/storage/archivos/2/aa.pdf' otra buena "{{Storage::url('archivos/'.$data->id.'/aa.pdf')}}"
    /*var url1 = "{{Storage::url('archivos/'.$data->id.'/aa.pdf')}}",
        url2 = "http://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Earth_Eastern_Hemisphere.jpg/600px-Earth_Eastern_Hemisphere.jpg";*/
        var url1 = "{{Storage::url('archivos/'.$data->id.'/aa.pdf')}}",
            url2 = "{{Storage::url('archivos/'.$data->id.'/bb.pdf')}}";

    $("#file").fileinput({
         language: 'es',
         //allowedFileExtensions: ['jpg', 'jpeg', 'png', 'pdf'],
        initialPreview: urlfilearray,
        //["/storage/archivos/2/aa.pdf","http://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Earth_Eastern_Hemisphere.jpg/600px-Earth_Eastern_Hemisphere.jpg"],
        initialPreviewAsData: true,
        initialPreviewConfig: objetoFiles,


        /*[
            {type: "pdf", url: url1, }, // disable download
            {type: "pdf", url: url2, }
        ],*/
        /*[
            
            {type: "pdf", size: 8000, caption: "aa.pdf", url: url1, key: 1, downloadUrl: url1}, // disable download
            {type: "pdf", size: 8000, caption: "bb.pdf", url: url2, key: 2, downloadUrl: url2}
            
        ],*/
        
        overwriteInitial: false,
        maxFileCount: 20,
        showUpload: false,
        showClose: false,
        initialPreviewAsData: true,
        dropZoneEnabled: false,

        
        /*deleteUrl: "file/{{17}}",
        deleteExtraData: {_token: $("[name='_token']").val()},*/
        theme: "fas",
    });

   //alert('{{$data->id}}');



   
</script>



@endsection

@section('contenido')

<div class="row">
    <div class="col-md-12">
        @include('includes.form-error')
        @include('includes.mensaje')
        <div class="card card-danger card-info">
            <div class="card-header">
                <h3 class="card-title"> Editar Documento {{$data->title}}</h3>
            </div>
            <div class="card-tools pull-right">
                    <a href="{{route('documento')}}" class="btn btn-block btn-secondary btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                    </a>
             </div>
              <!-- /.card-header -->
              <!-- form start -->



<div class="crearformdelete">

</div>

 <!--form action="{{route('eliminar_file', ['id' => 17])}}" class="d-inline form-eliminar" method="POST">
        @csrf @method("delete")
        <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro">
            <i class="fa fa-fw fa-trash text-danger"></i>
        </button>
</form-->   
        <form action="{{route('actualizar_documento', ['id' => $data->id])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
            @php
            $eseditar = 1;
            @endphp
            @csrf @method("put")
            <div class="card-body ">
                @include('documento.formulario')
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
