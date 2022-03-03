<html>
    <head>
        <style>
            /** 
            * Establecer los márgenes del PDF en 0
            * por lo que la imagen de fondo cubrirá toda la página.
            **/
            @page {
                margin: 1cm 0cm;
            }

            /**
            * Define los márgenes reales del contenido de tu PDF
            * Aquí arreglarás los márgenes del encabezado y pie de página
            * De tu imagen de fondo.
            **/
            body {
                margin-top:    1.5cm;
                margin-bottom: 1cm;
                margin-left:   1cm;
                margin-right:  1cm;
            }

            /** 
            * Defina el ancho, alto, márgenes y posición de la marca de agua.
            **/
            #watermark {
                position: fixed;
                bottom:   0px;
                left:     0px;
                /** El ancho y la altura pueden cambiar
                    según las dimensiones de su membrete
                **/
                width:    21.8cm;
                height:   28cm;

                /** Tu marca de agua debe estar detrás de cada contenido **/
                z-index:  -1000;
            }
        </style>
    </head>
    <body>
        <div id="watermark">
            
              <img  src="{{public_path('storage/imagenes/marcaagua/marcajpg/matrizcp.jpg')}}" height="100%" width="100%"> 
        </div>

        <main> 
            <!-- El contenido de tu PDF aquí -->
 
<table>
    <thead>
    <!--tr>
        <th></th>
    </tr>
    <tr style=" text-align: right;">
        
        <th >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; GERENCIA DE EVALUACIONES PREVENTIVAS DE SEGURIDAD LÓGICA</th>
    </tr>
     <tr>
        
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MATRIZ DE EVALUACIÓN INTEGRAL DE SEGURIDAD</th>
    </tr-->
     <tr>
        
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Archivo de {{ $datas[0]->tipodocs[0]->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $ldate = date('d-m-Y') }}</th>
        <!--H:i:s-->
    </tr>
    </thead>
    <tbody>
        <tr>    
            <td>
                
            </td>
        </tr>

    </tbody>
</table>
<br>
<table>
    <thead>
    <tr>
        <th>Tipo de Documento</th>
        <th>Tipo de Solicitud</th>

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

            @foreach ($tiposolicituds  as $tiposolicitud)
                
             @if( $tiposolicitud->id == $data->tiposolicitud_id)
              <td>{{ $tiposolicitud->name }}</td>
             @endif 
            @endforeach
    </tr>
    @endforeach
    </tbody>
</table>
<!-- tabl2-->
<table>
    <thead>
    <tr>
            <th>Identificador</th>

    </tr>
    </thead>
    <tbody>
    @foreach ($datas as $data)
    <tr>    
            <td>{{ $data->identificador }}</td>

    </tr>
 
    @endforeach

    </tbody>
</table>
<table>
    <thead>
    <tr>
            <th>Nro. Control</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($datas as $data)
    <tr>    
            <td>{{ $data->ncontrol }}</td>
    </tr>
 
    @endforeach

    </tbody>
</table>
<!-- fin tabl2-->

<!--dos tablas-->
<table>
    <thead>
    <tr>
        <th>Titulo</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{ $datas[0]->title }} </td>            
    </tr>   
    </tbody>
</table>
<table>
    <thead>
    <tr>
        <th>Responsable Interno</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{session()->get('usuario_name') ?? 'Invitado'}}</td>            
    </tr>   
    </tbody>
</table>
<br>
<table>
    <thead>
    <tr>
        <th>Responsable Externo</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{ $datas[0]->refexternas[0]->name }} </td>            
    </tr>   
    </tbody>
</table>
<br>
<!--table >
    <thead>
    <tr>
        <th>Fecha</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>Region</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td></td>            
    </tr>   
    </tbody>
</table-->

<!--fin dos tablas -->
<br>
<!--tercera tabla-->
<table border="1">
    <thead>
        <tr>
            
            <th>Pregunta</th>
            <th>Respuesta</th>
        </tr>
    </thead>
    <tbody>
          
        @foreach ($data->questions as $question)
        <tr>
            
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
<!--fin tercera tabla -->

<!--cuarta tabla-->
<table>
    <thead>
    <tr>
        <th>Observacion</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{ $datas[0]->observation }} </td>            
    </tr>   
    </tbody>
</table>
<!--fin cuarta tabla -->

<table align="center">
    <thead>
        <tr>
            <th>imagenes de Anexos</th>
        </tr>
    </thead>
    <tbody>

@foreach ($data->files as $file)
    @if(  $file->extension == 'jpg' || $file->extension == 'png'|| $file->extension == 'jpeg' )
      <tr><td></td></tr>
      
      <tr>
        
        <td>
            <div>
                {{$loop->last ? $file->name : $file->name . ', '}}
            </div>
        </td>

      </tr>

      <tr>
        
        <td>
          <img width="100%" height="400" src="{{public_path('storage/archivos/'.$data->id.'/'.$file->name)}}" alt="" style="width: 400px; height: 400px;">  
          <br>
        </td>
    </tr>
    @endif 
@endforeach



    </tbody>
</table>


</main>
    </body>
</html>
