$(document).ready(function () {
    Biblioteca.validacionGeneral('form-general');
    $('#foto').fileinput({
        language: 'es',
        allowedFileExtensions: ['jpg', 'jpeg', 'png'],
        maxFileSize: 5000,
        showUpload: false,
        showClose: false,
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        theme: "fas",
    });

            //var vectorPersonas = ['aa1', 'bb2', 'cc3', 'dd4']; 

            // $.each(vectorPersonas, function (ind, elem) { 
            //   console.log('¡Hola :'+elem+'!'); 
            // }); 
        $("#tipodoc_id").change(function(){
                //console.log("mensaje stándard por la consola");
                var tipodoc_id2 = $('select[id=tipodoc_id]').val();

        //alert('tiene'+tipodoc_id2);

        //$('#tipodoc_id2').val($(this).val());
        //$(".cc").html("<strong>Hola!!!!"+tipodoc_id2+"</strong>");

        var data = {
        tipodoc_id: tipodoc_id2,
        _token: $('input[name=_token]').val()
        };

        ajaxRequest('/documento/crear', data);
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

    //fin ajax <<





});



