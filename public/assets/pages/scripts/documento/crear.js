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

            //var vectorPersonas = ['Elena', 'Isabel', 'Ana', 'Ana']; 

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
          //tipodoc_id2: 'valor123',
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
                alert(respuesta);
                var pregunta = JSON.parse(respuesta);
                //console.log(pregunta);
/*var elmtTable = document.getElementById('#tbody');
var tableRows = elmtTable.getElementsByTagName('tr');
var rowCount = tableRows.length;*/
/*var tableRows[] = $('#tbody tr');
var rowCount = $('#tbody tr').length;
for (var x=rowCount-1; x>0; x--) {
      elmtTable.removeChild(tableRows[x]);
}*/

 $(".filaPregunta").remove();

                if(pregunta.length>0){
                var thead = '<tr class="filaPregunta"><th>ID</th><th>Pregunta</th><th></th></tr>'
                $('#thead').append(thead);
                }
                for (var i=0; i < pregunta.length;i++){

                    var todo =  '<tr class="filaPregunta"><td>'+pregunta[i].question_id+'</td><td>'+pregunta[i].name+'</td><td></td></tr>'
                        $('#tbody').append(todo);


                            //$("#r").html("<strong> mira </strong>");
                }
           

                Biblioteca.notificaciones(respuesta.respuesta, 'SAIR', 'success');
            }
        });
    }

    //fin ajax <<

});



