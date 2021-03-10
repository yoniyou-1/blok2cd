<table>
    <thead>
    <tr>
        <th>tipo de ducumento</th>
        <th>Identificador</th>
        <th>Nro. control</th>
        <th>titulo</th>
        <th>tipo de solicitud</th>
        <th>tipo de fecha</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($datas as $data)
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
            
                                @foreach ($data->tipofechas as $tipofecha)
                                @php($i = $loop->iteration -1)
                                	 @if( $tipofecha->name)
                                	 @if( $i == 0)
                                	 <td>
	                                    {{$tipofecha->name}}
	                                 </td>
	</tr>
                                	 @else
                                	 <tr>
                                	 	<td></td><td></td><td></td><td></td><td></td>
	                                	<td>
	                                    {{$tipofecha->name}}
	                                    </td>
	                                 </tr>

	                                 @endif 
	                                 @endif 
                                @endforeach
            
    
    @endforeach


    </tbody>
</table>