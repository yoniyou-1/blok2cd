
<table>
    <thead>
    <tr>
        <th>Tipo de Ducumento</th>
        <th>Identificador</th>
        <th>Nro. Control</th>
        <th>Titulo</th>
        <th>Tipo de Solicitud</th>
        <th>Responsable Externo</th>
        <th>Estatus</th>
        <th>Observacion</th>
        <th>Usuario en el rango de Fecha</th>
        <th>Tipo de Registro</th>
        <th>Fecha Inicial</th>
        <th>Fecha Final</th>
        <th>asiento</th>

    </tr>
    </thead>
    <tbody>
    @foreach ($datas as $data)
    @php($count = $loop->iteration)
    @php($usuario = $data->usuarios)


    <tr>	
    		<td>
                                @foreach ($data->tipodocs as $tipodoc)
                                    {{$loop->last ? $tipodoc->name : $tipodoc->name . ', '}}
                                @endforeach
            </td>
            <td>{{ $data->identificador }}</td>
            <td>{{ $data->ncontrol }}</td>
            <td>{{ $data->title }}</td>            
		    @foreach ($tiposolicituds  as $tiposolicitud)
		        
	         @if( $tiposolicitud->id == $data->tiposolicitud_id)
	          <td>{{ $tiposolicitud->name }}</td>
	         @endif 
		    @endforeach
            <td>
                                @foreach ($data->refexternas as $refexterna)
                                    {{$loop->last ? $refexterna->name : $refexterna->name . ', '}}
                                @endforeach
            </td>
            <td>
                                @foreach ($data->tipoestados as $tipoestado)
                                    {{$loop->last ? $tipoestado->name : $tipoestado->name . ', '}}
                                @endforeach
            </td>
            <td>{{ $data->observation }}</td>  
                                @foreach ($data->tipofechas as $tipofecha)
                                @php($i = $loop->iteration -1)
                                	 @if( $tipofecha->name)
                                	 @if( $i == 0)
                                     <td>
                                        {{$usuario[$i]->name}} {{$usuario[$i]->lastname}}
                                     </td>
                                	 <td>
	                                    {{$tipofecha->name}}
	                                 </td>
                                     <td>
                                        {{$usuario[$i]->pivot->fechaini}}
                                     </td>
                                     <td>
                                        {{$usuario[$i]->pivot->fechafin}}
                                     </td>
                                     <td>
                                        {{$count}}
                                     </td>

	</tr>
                                	 @else
                                	 <tr>
                                	 	<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>

                                        <td>
                                        {{$usuario[$i]->name}} {{$usuario[$i]->lastname}}
                                        </td>
	                                	<td>
	                                    {{$tipofecha->name}}
	                                    </td>
                                        <td>
                                        {{$usuario[$i]->pivot->fechaini}}
                                        </td>
                                        <td>
                                        {{$usuario[$i]->pivot->fechafin}}
                                        </td>
                                        <td>
                                        {{$count}}
                                        </td>

	                                 </tr>

	                                 @endif 
	                                 @endif 
                                @endforeach
            
    
    @endforeach



    </tbody>
</table>


<table>
    <thead>
        <tr>
            <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
            <th>Pregunta</th>
            <th>Respuesta</th>
        </tr>
    </thead>
    <tbody>
          
        @foreach ($data->questions as $question)
        <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>  
            <td>
                {{ $question->name }}
            </td>
             <td>
                @if( $question->pivot->state == 1)
                    Cumple
                    @elseif ( $question->pivot->state == 2)
                    No Cumple
                    @elseif ( $question->pivot->state == 0)
                    No Aplica
                @endif
            </td>
        </tr>   
        @endforeach
       
    </tbody>
</table>


<table>
    <thead>
        <tr>
            <th>imagenes de Anexos</th>
        </tr>
    </thead>
    <tbody>

@foreach ($data->files as $file)
    @if(  $file->extension == 'jpg' || $file->extension == 'png'|| $file->extension == 'jpeg' )
      <tr><td></td></tr>
      
      <tr><td>
        <div>
            {{$loop->last ? $file->name : $file->name . ', '}}
        </div>
      </td></tr>

      <tr><td>
          <img width="100%" height="400" src="{{public_path('storage/archivos/'.$data->id.'/'.$file->name)}}" alt="" style="width: 10px; height: 10px;">  
          <br>

      </td></tr>
    @endif 
@endforeach



    </tbody>
</table>