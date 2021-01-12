
	@foreach ($documento->questions as $question)
	<div>
		{{$loop->last ? $question->name : $question->name . ', '}}
    </div>
    @endforeach
<div>{{$documento->id}}</div>
<div>{{$documento->title}}</div>
<div>{{$documento->observation}}</div>
<div><img style="width: 100%; height: auto; " src="{{Storage::url("imagenes/caratulas/$documento->foto")}}" alt="una Imagen del documento"></div>

<!--div><img style="width: 100%; height: auto;" src="{{Storage::url("imagenes/caratulas/aa.jpg")}}" alt="una Imagen del documentox"></div-->

<!--iframe width="100%" height="400" src="{{Storage::url('archivos/1/OP (JD)11.09.2020 C33386 Corregir Campo cuenta del cliente en el TDF011..pdf')}}" frameborder="0"></iframe-->

@foreach ($documento->files as $file)
	@if( $file->extension == 'pdf' || $file->extension == 'jpg' || $file->extension == 'png'|| $file->extension == 'jpeg' )
	<div>
		{{$loop->last ? $file->name : $file->name . ', '}}
    </div>
	
	  <iframe width="100%" height="400" src="{{Storage::url('archivos/'.$documento->id.'/'.$file->name)}}" frameborder="0"></iframe>  
	  <br>
	@else
	<div class="card-body table-responsive">
       <div class="form-group "> 
        <table class="table table-striped table-bordered table-hover" id="tabla-data">
            <thead id="thead">
            	<tr><td> 
            		{{$loop->last ? $file->name : $file->name . ', '}}
            	</td></tr>
            </thead>
            <tbody id="tbody">
            	<tr><td> 
            		<a href="{{Storage::url('archivos/'.$documento->id.'/'.$file->name)}}" download="Archivo">Descargar {{$file->name}}</a>
            	</td></tr>
            </tbody>
        </table>
       </div>
    </div>
	
	
	@endif

@endforeach