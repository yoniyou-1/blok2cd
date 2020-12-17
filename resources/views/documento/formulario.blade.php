<!-- Inicia isset es Editar selector -->

    

<p id="ur"></p>
<p id="r"></p>
<div class="cc"></div>

<!-- Inicia isset es Editar selector -->
@isset($eseditar)    
<div class="form-group ">
    <label for="tipodoc_id" class="col-lg-3 control-label requerido">Tipo</label>
    <div class="col-lg-8">
        <select name="tipodoc_id" id="tipodoc_id" class="form-control" required>
            @foreach($tipodocs as $id => $name)                
                @if($id== $data->tipodocs[0]->id )
                    <option value="{{$id}}" {{old("tipodoc_id", $data->tipodocs[0]->id ?? "") == $id ? "selected" : ""}}>{{$name}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>
@endisset
<!-- termina isset es Editar selector -->
<!-- Inicia isset es Crear selector -->
@isset($escrear)
<div class="form-group ">
    <label for="tipodoc_id" class="col-lg-3 control-label requerido">Tipo</label>
    <div class="col-lg-8">
        <select name="tipodoc_id" id="tipodoc_id" class="form-control" required>
            <option value="">Seleccione el tipo de documento</option>
            @foreach($tipodocs as $id => $name)
                <option value="{{$id}}" {{"tipodoc_id", $data->tipodocs[0]->id ?? "" == $id ? "selected" : ""}}>{{$name}}</option>
            @endforeach
        </select>
    </div>
</div>
@endisset
<!-- Termina isset es Crear selector -->
<div class="form-group">
    <label for="identificador" class="col-lg-3 control-label requerido">Identificador</label>
    <div class="col-lg-8">
    <input type="text" name="identificador" id="identificador" class="form-control" value="{{old('identificador', $data->identificador ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="ncontrol" class="col-lg-3 control-label requerido">Control de Cambio Nro</label>
    <div class="col-lg-8">
    <input type="text" name="ncontrol" id="ncontrol" class="form-control" value="{{old('ncontrol', $data->ncontrol ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="title" class="col-lg-3 control-label requerido">Título</label>
    <div class="col-lg-8">
    <input type="text" name="title" id="title" class="form-control" value="{{old('title', $data->title ?? '')}}" required/>
    </div>
</div>


<div class="form-group ">
    <label for="tiposolicitud_id" class="col-lg-3 control-label requerido">Tipo de Solicitud</label>
    <div class="col-lg-8">
        <select name="tiposolicitud_id" id="tiposolicitud_id" class="form-control" required>
           <option value="">Seleccione el Tipo de Solicitud</option>
            @foreach($tiposolicituds as $id => $name)                
                
                    <option value="{{$id}}" {{old("tiposolicitud_id", $data->tiposolicitud_id ?? "") == $id ? "selected" : ""}}>{{$name}}</option>
                
            @endforeach
        </select>
    </div>
</div>

<!--div class="form-group">
    <label for="cantidad" class="col-lg-3 control-label requerido">Cantidad</label>
    <div class="col-lg-8">
    <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{old('cantidad', $data->cantidad ?? '')}}" required/>
    </div>
</div-->
<div class="form-group">
    <label for="observation" class="col-lg-3 control-label requerido">Observacion</label>
    <div class="col-lg-8">
    <input type="text" name="observation" id="observation" class="form-control" value="{{old('observation', $data->observation ?? '')}}" required/>
    </div>
</div>
<!--div class="form-group">
    <label for="editorial" class="col-lg-3 control-label">Editorial</label>
    <div class="col-lg-8">
    <input type="text" name="editorial" id="editorial" class="form-control" value="{{old('editorial', $data->editorial ?? '')}}"/>
    </div>
</div-->


<div class="form-group ">
    <label for="    tipoestado_id" class="col-lg-3 control-label requerido">Tipo Estado</label>
    <div class="col-lg-8">
        <select name="  tipoestado_id" id = "tipoestado_id" class="form-control" required>
        <option class="filaPregunta2" value="" >Seleccione el Tipo de Estado</option>
        </select>
    </div>
</div>


<div class="form-group">
    <label for="estado" class="col-lg-3 control-label requerido">Estado</label>
    <div class="col-lg-8">
    <input type="text" name="estado" id="estado" class="form-control" value="{{old('estado', $data->estado ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="foto" class="col-lg-3 control-label">Soporte</label>
    <div class="col-lg-5">
        <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($data->foto) ? Storage::url("imagenes/caratulas/$data->foto") : "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Caratula+Libro"}}" accept="image/*"/>
    </div>
</div>





            <div class="card-body table-responsive">
               <div class="form-group "> 
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead id="thead">

                    </thead>
                    <tbody id="tbody">

                    </tbody>
                </table>
                </div>
            </div>
<!-- Comienza isset es Editar tabla-preguntas -->
@isset($eseditar)    

            @foreach ($data->questions as $question)
            @if(isset($question->pivot->state))
            <input type="hidden"  value="{{$questionhay = 1}}" />
            @endif
            @endforeach
            <input type="hidden"  value="{{ $questionhay ?? $questionhay = 0 }}" />
            @if( $questionhay > 0  )
            <div class="card-body table-responsive">
               <div class="form-group "> 
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead id="thead">
                    <tr class="filaPregunta"><th>ID</th><th>Pregunta</th><th></th><th></th><th></th></tr>
                    </thead>
                    <tbody id="tbody">

                                                  
                                @foreach ($data->questions as $question)
                                @php($i = $loop->iteration -1)
                                <tr> 
                                <td>
                                    {{$loop->last ? $question->id : $question->id}}
                                    <input class="form-control" id="question_id[]" name="question_id[]" type="hidden" value="{{$loop->last ? $question->id : $question->id}}">
                                </td>
                                <td>
                                    {{$loop->last ? $question->name : $question->name}}
                                </td>
                                <td>
                                    
                                </td>
                                <td>
                                    {{$loop->last ? $question->pivot->state : $question->pivot->state}}
                                </td>
                                <td class="text-center" >
                                    
                                    <span class="checkbox"></span> <input class="stateClass bb{{$i}}" type="hidden" id="state[{{$i}}]" name="state[{{$i}}]" value="{{old('state.'.$i.'', $loop->last ? $question->pivot->state : $question->pivot->state)}}">
                                </td>
                                </tr>
                                @endforeach
                        
                        
                    </tbody>
                </table>
                </div>
            </div>
            @endif  
@endisset
<!-- termina isset es Editar tabla-preguntas -->



<div class="row showName" style="margin: 10px;">
            <div class="col-4 offset-4">
                <input type="button" name="addfecha" id="addfecha" class="btn btn-success btn-block addmore" value="Agregar Fecha" />
            </div>
        </div>


 @if( old('fechaini') )

    

     @foreach( old('fechaini') as $i => $field)
     <div id="dynamicFieldsXX">
 <!-- Start row -->
                @isset($eseditar) 
                    @if( old('usuario_id.'.$i.''))
                    @if(old('usuario_id.'.$i.'') == session()->get('user_id'))
                    <div class="row removing{{$i}} mb-4">
                    @else
                    <div class="row  mb-4">
                    <input type="hidden"  value="{{$readonly = 'readonly'}}" />
                    @endif
                    @else
                    <div class="row removing{{$i}} mb-4">
                    @endif
                @endisset
                @isset($escrear)
                <div class="row removing{{$i}} mb-4">
                @endisset
                    <div class="col-2">
                        <div class="d-flex">
                            <div class="p-1">
                                <label class="showName p-2" for="date">Fechas</label>
                            </div> 
                        </div>
                    </div>
                    <div class="col-4"> 
                        <div class="d-flex">                    
                            <div class="flex-fill p-2">
                                <input class="form-control showName" 
                                        type="datetime-local" 
                                        name="fechaini[{{$i}}]" value="{{old('fechaini.'.$i.'')}}"
                                {{$readonly ?? ''}} required>
                            </div>
                        </div> 
                    </div>
                    <div class="col-4"> 
                        <div class="d-flex">                    
                            <div class="flex-fill p-2">
                                <input class="form-control showName" 
                                        type="datetime-local" 
                                        name="fechafin[{{$i}}]" value="{{old('fechafin.'.$i.'')}}"
                               {{$readonly ?? ''}} required>
                            </div>
                        </div> 
                    </div>
                    @isset($eseditar) 
                    @if( old('usuario_id.'.$i.''))

                    <div class="col-2"> 
                        <div class="d-flex">                    
                            <div class="flex-fill p-2">
                                <input class="form-control showName" 
                                        type="hidden" 
                                        name="user_name[{{$i}}]" value="{{old('user_name.'.$i.'')}}"
                                readonly required>
                                <i class="fondo_text">{{old('user_name.'.$i.'')}}</i>
                                <input class="form-control showName" 
                                        type="hidden" 
                                        name="usuario_id[{{$i}}]" value="{{old('usuario_id.'.$i.'')}}"
                                >
                            </div>
                        </div> 
                    </div>
                    @unset($readonly)
                    @endif
                    @endisset
                </div> <!-- End row --> 
                <!-- inicio boton quitar fechas --> 
                 @isset($eseditar) 
                    @if( old('usuario_id.'.$i.''))
                    @if(old('usuario_id.'.$i.'') == session()->get('user_id'))
                    <div class="row removing{{$i}} showName" style="margin: 10px;">
                    <div class="col-4 offset-4">
              
                    <input type="button" class="btn btn-danger btn-block remove-fields delfecha" id="removing{{$i}}" name="delfecha{{$i}}"  value="Remover Fecha">
                     </div>
                    </div>
                    
                    @endif
                    @else
                    <div class="row removing{{$i}} showName" style="margin: 10px;">
                    <div class="col-4 offset-4">
              
                    <input type="button" class="btn btn-danger btn-block remove-fields delfecha" id="removing{{$i}}" name="delfecha{{$i}}"  value="Remover Fecha">
                     </div>
                    </div>
                    @endif
                @endisset
                @isset($escrear)
                <div class="row removing{{$i}} showName" style="margin: 10px;">
                    <div class="col-4 offset-4">
              
                    <input type="button" class="btn btn-danger btn-block remove-fields delfecha" id="removing{{$i}}" name="delfecha{{$i}}"  value="Remover Fecha">
                     </div>
                 </div>
                @endisset
                 <!--fin boton quitar fechas --> 
                


            </div> <!-- End dynamicFields -->

       

        @if (empty($countarrayviejo))
        <input type="hidden"  value="{{$countarrayviejo = 0}}" />
        @endif  
        @if( $i > $countarrayviejo )
        <input type="hidden"  value="{{$countarrayviejo = $i}}" />
        @endif

      @endforeach

<input type="hidden" id="countarrayviejo" name="countarrayviejo" value="{{$countarrayviejo ?? 0}}" />
@endif

<!-- Comienza empty es Editar fechas part1 -->
@isset($eseditar) 
@if(empty( old('fechaini') ))
<input type="hidden"  value="{{$i = 0}}" />
@foreach( $data->usuarios as $usuario)
     <div id="dynamicFieldsXXY">
 <!-- Start row -->
 @if($usuario->pivot->usuario_id == session()->get('user_id'))
                <div class="row removing{{$i}} mb-4">
 @else
                <div class="row  mb-4">
                <input type="hidden"  value="{{$readonly = 'readonly'}}" />
 @endif
                    <div class="col-2">
                        <div class="d-flex">
                            <div class="p-1">
                                <label class="showName p-2" for="date">Fechas</label>
                            </div> 
                        </div>
                    </div>
                    <div class="col-4"> 
                        <div class="d-flex">                    
                            <div class="flex-fill p-2">
                                <input class="form-control showName" 
                                        type="datetime-local" 
                                        name="fechaini[{{$i}}]" value="{{date('Y-m-d\TH:i', strtotime($usuario->pivot->fechaini))}}"
                                {{$readonly ?? ''}} required>
                            </div>
                        </div> 
                    </div>
                    <div class="col-4"> 
                        <div class="d-flex">                    
                            <div class="flex-fill p-2">
                                <input class="form-control showName" 
                                        type="datetime-local" 
                                        name="fechafin[{{$i}}]" value="{{date('Y-m-d\TH:i', strtotime($usuario->pivot->fechafin))}}"
                               {{$readonly ?? ''}} required>
                            </div>
                        </div> 
                    </div>
                    @unset($readonly)
                    <div class="col-2"> 
                        <div class="d-flex">                    
                            <div class="flex-fill p-2">
                                <input class="form-control showName" 
                                        type="hidden" 
                                        name="user_name[{{$i}}]" value="{{$usuario->name}}"
                                readonly required>
                                <i class="fondo_text">{{$usuario->name}}</i>
                                <input class="form-control showName" 
                                        type="hidden" 
                                        name="usuario_id[{{$i}}]" value="{{$usuario->pivot->usuario_id}}"
                                >

                            </div>
                        </div> 
                    </div>
                </div> <!-- End row --> 
                @if($usuario->pivot->usuario_id == session()->get('user_id'))
                            <div class="row removing{{$i}} showName" style="margin: 10px;">
              <div class="col-4 offset-4">
              
               <input type="button" class="btn btn-danger btn-block remove-fields delfecha" id="removing{{$i}}" name="delfecha{{$i}}"  value="Remover Fecha">
            </div>
          </div>
            @endif
            </div> <!-- End dynamicFields -->

       
@if (empty($countarrayviejo))
        <input type="hidden"  value="{{$countarrayviejo = 0}}" />
        @endif  
        @if( $i > $countarrayviejo )
        <input type="hidden"  value="{{$countarrayviejo = $i}}" />
        @endif
        <input type="hidden"  value="{{$i++}}" />
      @endforeach

<input type="hidden" id="countarrayviejo" name="countarrayviejo" value="{{$countarrayviejo ?? 0}}" />
@endif   
@endisset
<!-- termina empty es Editar fechas part1-->




        <div id="dynamicFields">
</div>


