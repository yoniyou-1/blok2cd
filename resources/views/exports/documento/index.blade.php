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
        <th>orden</th>
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