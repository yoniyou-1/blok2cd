$(document).ready(function () {
    Biblioteca.validacionGeneral('form-general');
    $('#foto').fileinput({
        language: 'es',
        allowedFileExtensions: ['jpg', 'jpeg', 'png'],
        maxFileSize: 5000,
        //maxFileCount: 5,
        showUpload: false,
        showClose: false,
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        theme: "fas",
    });

    $('#file').fileinput({
        language: 'es',
        //allowedFileExtensions: ['jpg', 'jpeg', 'png', 'pdf'],
        //maxFileSize: 5000,
        maxFileCount: 10,
        showUpload: false,
        showClose: false,
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        theme: "fas",
    });

         /*var url1 = 'http://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/FullMoon2010.jpg/631px-FullMoon2010.jpg',
        url2 = 'http://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Earth_Eastern_Hemisphere.jpg/600px-Earth_Eastern_Hemisphere.jpg';
    $("#input-25").fileinput({
        initialPreview: [url1, url2],
        initialPreviewAsData: true,
        initialPreviewConfig: [
            {caption: "Moon.jpg", downloadUrl: url1, size: 930321, width: "120px", key: 1},
            {caption: "Earth.jpg", downloadUrl: url2, size: 1218822, width: "120px", key: 2}
        ],
        
        overwriteInitial: false,
        maxFileCount: 5,
        showUpload: false,
        showClose: false,
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        theme: "fas",
    });*/


            //var vectorPersonas = ['aa1', 'bb2', 'cc3', 'dd4']; 

            // $.each(vectorPersonas, function (ind, elem) { 
            //   console.log('¡Hola :'+elem+'!'); 
            // }); 
            // aplica el buscador al selector con clase select 
            $('.miselect2').select2();
            
            $('#origen').hide();

        $('#identificador').on('blur', function() {

          var identificador2 = $('#identificador').val();
          var tipodoc_id2 = $('select[id=tipodoc_id]').val();
          var ncontrol2 = $('#ncontrol').val();
          if(typeof(identificador2) != "undefined" && identificador2 !== null && identificador2 !== "" && tipodoc_id2 !== "") {
          if(typeof(ncontrol2) != "undefined" && ncontrol2 !== null && ncontrol2 !== "" ) {
          }else{ var ncontrol2 = "";}

          var data = {
          tipodoc_id: tipodoc_id2,
          ncontrol: ncontrol2,
          identificador: identificador2,
          _token: $('input[name=_token]').val()
          };

          //existencia de identificador
          ajaxRequest4('../documento/crear4', data);
          //alert(identificador2);

          }


        });

        $('#ncontrol').on('blur', function() {

          var ncontrol2 = $('#ncontrol').val();
          var identificador2 = $('#identificador').val();
          var tipodoc_id2 = $('select[id=tipodoc_id]').val();
          
          if(typeof(ncontrol2) != "undefined" && ncontrol2 !== null && ncontrol2 !== "" && tipodoc_id2 !== "") {
          if(typeof(identificador2) != "undefined" && identificador2 !== null && identificador2 !== "" ) {
          }else{ var identificador2 = "";}

          var data = {
          tipodoc_id: tipodoc_id2,
          ncontrol: ncontrol2,
          identificador: identificador2,
          _token: $('input[name=_token]').val()
          };

          //existencia de identificador
          ajaxRequest4('../documento/crear4', data);
          //alert(identificador2);

          }


        });
            
        $("#tipodoc_id").change(function(){
                //console.log("mensaje stándard por la consola");
                var tipodoc_id2 = $('select[id=tipodoc_id]').val();

        //alert('tiene'+tipodoc_id2);

        //$('#tipodoc_id2').val($(this).val());
        //$(".cc").html("<strong>Hola!!!!"+tipodoc_id2+"</strong>");

        

        var identificador2 = $('#identificador').val();
        var ncontrol2 = $('#ncontrol').val();
        if(typeof(identificador2) != "undefined" && identificador2 !== null && identificador2 !== "" && tipodoc_id2 !== "") {
        if(typeof(ncontrol2) != "undefined" && ncontrol2 !== null && ncontrol2 !== "" ) {
        }else{ var ncontrol2 = "";}

          var data = {
        tipodoc_id: tipodoc_id2,
        ncontrol: ncontrol2,
        identificador: identificador2,
        _token: $('input[name=_token]').val()
        };

        //existencia de identificador
        ajaxRequest4('../documento/crear4', data);
        //alert(identificador2);

        }else{

          var data = {
        tipodoc_id: tipodoc_id2,
        _token: $('input[name=_token]').val()
        };

        }
        
        
        //referencia externa
        ajaxRequest5('../documento/crear5', data);
        //tipo de fecha
        ajaxRequest3('../documento/crear3', data);
        //tipo de estado
        ajaxRequest2('../documento/crear2', data);
        //preguntas
        ajaxRequest('../documento/crear', data);
        });


        function ajaxRequest (url, data) {

            // $.each(data, function (ind, elem) { 
            //   console.log('¡Hola :'+elem+'!'); 
            // });

            //$("#ur").html("<strong>la URL : "+data+"</strong>");
             //$(data).each(function(){ alert($(this).text(tipodoc_id2)) });
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
/*            beforeSend: function () {
                        $("#r").html("Procesando, espere por favor...");
                },*/
            success: function (respuesta) {
                //alert(respuesta);
                var pregunta = JSON.parse(respuesta);
                //console.log(pregunta);

                 $(".filaPregunta").remove();
                 if(pregunta.length>0){
                    var thead = '<tr class="filaPregunta"><th>ID</th><th>Pregunta</th><th></th><th></th></tr>'
                    $('#thead').append(thead);
                }
                
                for (var i=0; i < pregunta.length;i++){

                    var todo = 
  
                    '<tr class="filaPregunta"><td>'
                    +pregunta[i].question_id+'</td><td>'+pregunta[i].name+
                    '</td><td></td>'
                    //+'<input class="form-control" id="quest'+pregunta[i].question_id+'" name="quest'+pregunta[i].question_id+'" type="hidden" value="'+pregunta[i].question_id+'">'+
                    +'<input class="form-control" id="question_id[]" name="question_id[]" type="hidden" value="'+pregunta[i].question_id+'">'                    
                    //+'<input class="form-control" id="state[]" name="state[]" type="hidden" value="'+pregunta[i].question_id+'">'+
                    
                    
                    //'<input type="hidden" id="state['+i+']" name="state['+i+']" value="0"> <input type="checkbox" id="state['+i+']" name="state['+i+']" value="1">'
                    +
                    '<td class="text-center">'
                    +
                    '<span class="checkbox"></span> <input type="hidden" id="state[]" name="state[]" value="0">'
                    
                    +
                    '</td>'
                    '</tr>'
                        $('#tbody').append(todo);

                       
                            //$("#r").html("<strong> mira </strong>");
                }

                        $('.checkbox').click(function(){
                      if ($(this).hasClass('positive')){
                        $(this).removeClass('positive');
                        $(this).addClass('negative');
                        $(this).html('<svg id="i-close" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="10.9375%"><path d="M2 30 L30 2 M30 30 L2 2" /></svg>');
                        $(this).next().val('2');
                      } else if ($(this).hasClass('negative')){
                        $(this).removeClass('negative');
                        $(this).html('');
                        $(this).next().val('0');
                      } else {
                        $(this).addClass('positive');
                        $(this).html('<svg id="i-checkmark" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="10.9375%"><path d="M2 20 L12 28 30 4" /></svg>');
                        $(this).next().val('1');
                    
                      }
                    });
           

                Biblioteca.notificaciones(respuesta.respuesta, 'SAIR', 'success');
            }
        });
    }

    //fin ajax 1<<

             
        


        function ajaxRequest2 (url, data) {

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (respuesta) {
                //alert(respuesta);
                var tipoestado = JSON.parse(respuesta);
                //console.log(tipoestado);

                 $(".filaPregunta2").remove();
                 if(tipoestado.length>0){
            for (var i=0; i < tipoestado.length;i++){

                    
                    if(i==0){var a = '<option class="filaPregunta2" value="" >Seleccione el Tipo de Estado</option>'
                      var todo = '<option class="filaPregunta2" value="'
                    +tipoestado[i].tipoestado_id+'">'+tipoestado[i].name
                    +'</option>'
                    $('#tipoestado_id').append(a,todo);
                    }else{ var todo = '<option class="filaPregunta2" value="'
                    +tipoestado[i].tipoestado_id+'">'+tipoestado[i].name
                    +'</option>'
                    $('#tipoestado_id').append(todo);
                    } 
                    
                 }

                }
                else{
                  var a = '<option class="filaPregunta2" value="" >Seleccione el Tipo de Estado. Nota:(Primero Seleccione el Tipo de Documento)</option>'
                  $('#tipoestado_id').append(a);
                }



                Biblioteca.notificaciones(respuesta.respuesta, 'SAIR', 'success');
            }
        });
    }

    //fin ajax 2<<

             

        function ajaxRequest5 (url, data) {

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (respuesta) {
                //alert(respuesta);
                var refexterna = JSON.parse(respuesta);
                //console.log(refexterna);

                 $(".filaPregunta5").remove();
                 if(refexterna.length>0){
            for (var i=0; i < refexterna.length;i++){

                    
                    if(i==0){var a = '<option class="filaPregunta5" value="" >Seleccione Referencia Externa</option>'
                      var todo = '<option class="filaPregunta5" value="'
                    +refexterna[i].refexterna_id+'">'+refexterna[i].name
                    +'</option>'
                    $('#refexterna_id').append(a,todo);
                    }else{ var todo = '<option class="filaPregunta5" value="'
                    +refexterna[i].refexterna_id+'">'+refexterna[i].name
                    +'</option>'
                    $('#refexterna_id').append(todo);
                    } 
                    
                 }

                }
                else{
                  var a = '<option class="filaPregunta5" value="" >Seleccione el Tipo de Estado. Nota:(Primero Seleccione el Tipo de Documento)</option>'
                  $('#refexterna_id').append(a);
                }



                Biblioteca.notificaciones(respuesta.respuesta, 'SAIR', 'success');
            }
        });
    }

    //fin ajax 5<<


        function ajaxRequest3 (url, data) {

        $.ajax({
            //async:false,
            url: url,
            type: 'POST',
            data: data,
            success: function (respuesta) {
                //alert(respuesta);
                var tipofecha = JSON.parse(respuesta);
                //console.log(tipoestado);

                 $(".filaPregunta3").remove();
                 if(tipofecha.length>0){

                  var count_tipofecha_id = $(".count_tipofecha_id").length;
                  var divs = $(".count_tipofecha_id").toArray();
            for (var i=0; i < tipofecha.length;i++){

                    
                    if(i==0){var a = '<option class="filaPregunta3" value="" >Seleccione el Tipo de fecha</option>'
                      var todo = '<option class="filaPregunta3" value="'
                    +tipofecha[i].tipofecha_id+'">'+tipofecha[i].name
                    +'</option>'
                    $('#tipofecha_id').append(a,todo);
                    
                    for (var j=0; j < count_tipofecha_id;j++){

                      /*var muestra = divs[j];
                      console.log(muestra);*/
                      var nroClasse = $(divs[j]).attr('class').split(' ')[1].substr(23);

                        $('#tipofecha_id'+nroClasse).append(a,todo);
                      console.log(nroClasse);

                    }

                    }else{ var todo = '<option class="filaPregunta3" value="'
                    +tipofecha[i].tipofecha_id+'">'+tipofecha[i].name
                    +'</option>'
                    $('#tipofecha_id').append(todo);

                    for (var k=0; k < count_tipofecha_id;k++){

                      /*var muestra = divs[k];
                      console.log(muestra);*/
                      var nroClasse = $(divs[k]).attr('class').split(' ')[1].substr(23);

                        $('#tipofecha_id'+nroClasse).append(todo);
                      //console.log(nroClasse);

                    }





                    } 
                    
                 }
                  //console.log(divs);
                }
                else{
                  var a = '<option class="filaPregunta3" value="" >Seleccione el Tipo de fecha. Nota:(Primero Seleccione el Tipo de Documento)</option>'
                  $('#tipofecha_id').append(a);
                }



                Biblioteca.notificaciones(respuesta.respuesta, 'SAIR', 'success');
            }
        });
    }

    //fin ajax 3<<
            function ajaxRequest4 (url, data) {

        $.ajax({
            //async:false,
            url: url,
            type: 'POST',
            data: data,
            success: function (respuesta) {

                 var existencia = JSON.parse(respuesta);
                console.log(existencia);
                $("#store").prop('disabled', !existencia);

                 $(".filaPregunta4").remove();
                 if(!existencia){
                 var existecomposicion = '<div class="alert col-lg-8 filaPregunta4 alert-danger"><strong>Oh no!</strong> Ya Existe una composicion similar entre: ( Tipo-documento_Identificador_y_N-control ).</div>'
                    
                  setTimeout(function(){
                    $('#existecomposicion').slideUp( 300 ).fadeIn( 1000 ).append(existecomposicion);
                  }, 1000);

                    }
                Biblioteca.notificaciones(respuesta.respuesta, 'SAIR', 'success');
            }
        });
    }

    //fin ajax 4<<
var countarrayviejo = $('input#countarrayviejo').val();
if(typeof(countarrayviejo) != "undefined" && countarrayviejo !== null) {


    //alert('addv'+countarrayviejo);
    var countarraynuevo = parseInt(countarrayviejo)+1;
    //alert('addn'+countarraynuevo);
    $("#countarrayviejo").val(countarraynuevo);
    var i = parseInt(countarraynuevo);

}else{
  var i = 0; 
  //alert(i);
}


       // Start from 1
       //alert(t);
        //var i = 0;
        // When button clicked
        $('.addmore').click(function(){
            
            // add the following layout
            $('#dynamicFields').append(
              '<div class="row removing'+i+'"><div class="col-2"><div class="d-flex"><div class="p-1">'
              +
              '<label class="showName p-2" for="date"> Fechas</label>'
              +
              '</div></div></div>'
              +
              '<div class="col-4"> <div class="d-flex"><div class="flex-fill p-2">'
              +
              '<input class="form-control showName" type="datetime-local" name="fechaini['+i+']" required>'
              +
              '</div></div> </div>'
              +
              '<div class="col-4"> <div class="d-flex"><div class="flex-fill p-2">'
              +
              '<input class="form-control showName" type="datetime-local" name="fechafin['+i+']" required>'
              +
              '</div></div> </div>'
              +
              '</div>'
              +
              '<div class="row unique_div_tipofecha_id'+i+' removing'+i+' showName count_tipofecha_id" style="margin-left: 160px;">'
              +
              '<div  id="destino'+i+'" class="col-lg-7">'
              +
              '</div>'
              +
              '</div>'
              +
              '<div class="row removing'+i+' showName" style="margin: 10px;">'
              +
              '<div class="col-4 offset-4">'
              +
              '<input type="button" class="btn btn-danger btn-block remove-fields delfecha" id="removing'+i+'" name="delfecha'+i+'"  value="Remover Fecha">'
              
              +
              '</div>'
              +
              '</div>');

              $("#origen").clone().appendTo("#destino"+i);
              $('div#destino'+i+' div#origen').attr("id","origen"+i).show();
              //$('div#destino'+i+' div#origen'+i+' select#tipofecha_id').attr("id","tipofecha_id"+i);
              $('div#destino'+i+' div#origen'+i+' select#tipofecha_id').attr({"id":"tipofecha_id"+i,"name":"tipofecha_id["+i+"]", "required":true});
            i++;
            });
        // Removing fields






 //$(document).on('click', 'input[type="button"]', function(event) {
//$('input.delfecha').click(function(){
    $(document).on('click', '.delfecha', function(){
    let id = this.id;
    console.log("Se presionó el Boton con Id :"+ id);
    $('.'+id).remove();

    var countarrayviejo = $('input#countarrayviejo').val();
    if(typeof(countarrayviejo) != "undefined" && countarrayviejo !== null) {
    //alert('delv'+countarrayviejo);
    var countarraynuevo = parseInt(countarrayviejo)-1;
    //alert('deln'+countarraynuevo);
    $("#countarrayviejo").val(countarraynuevo);
}




  });


});




