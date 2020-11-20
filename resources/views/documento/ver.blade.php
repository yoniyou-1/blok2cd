
	@foreach ($documento->questions as $question)
	<div>
		{{$loop->last ? $question->name : $question->name . ', '}}
    </div>
    @endforeach

<div>{{$documento->title}}</div>
<div>{{$documento->observation}}</div>
<div><img style="width: 100%; height: auto;" src="{{Storage::url("imagenes/caratulas/$documento->foto")}}" alt="una Imagen del documento"></div>