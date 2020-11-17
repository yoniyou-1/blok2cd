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
                    +'<input class="form-control" id="question_id[]" name="question_id[]" type="hidden" value="'+pregunta[i].question_id+'">'+                    
                    +'<input class="form-control" id="state[]" name="state[]" type="hidden" value="'+pregunta[i].question_id+'">'+
                    '<td class="text-center">'
                    +
                    '<input type="hidden" id="state['+i+']" name="state['+i+']" value="0"> <input type="checkbox" id="state['+i+']" name="state['+i+']" value="1">'
                    +
                    '</td>'
                    '</tr>'
                        $('#tbody').append(todo);

                       
                            //$("#r").html("<strong> mira </strong>");
                }
           

                Biblioteca.notificaciones(respuesta.respuesta, 'SAIR', 'success');
            }
        });
    }

    //fin ajax <<


/*$("#form-general").on('submit', function() {
            // to each unchecked checkbox
            alert('cambiando a true');
            $(this + 'input[type=checkbox]:not(:checked)').each(function () {
                // set value 0 and check it
                $(this).attr('checked', true).val(5);
            });
        })
*/



});



