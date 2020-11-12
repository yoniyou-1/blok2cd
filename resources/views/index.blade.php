<html>

<head>

<title>Ejemplo sencillo de AJAX </title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
function realizaProceso(valorCaja1, valorCaja2){

        var parametros = {
                "valorCaja1" : valorCaja1,
                "valorCaja2" : valorCaja2,
                _token: $('input[name=_token]').val()
        };
        $.ajax({
                data:  parametros,
                url:   '{{url("ajaxteach")}}',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (data) {

                    var dhtml="";
                        for (datas in data.datos) {
                          dhtml+=' <p> Nombre: '+data.datos[datas].login+'</p>';
                        };
                    
                    $("#resultado").html(data.resultado + " "+ data.sms+" "+dhtml);
                }
        });
}
</script>

</head>

<body>

Introduce valor 1
<input type="text" name="caja_texto" id="valor1" value="0"/> 


Introduce valor 2
<input type="text" name="caja_texto" id="valor2" value="0"/>

<meta name="csrf-token" content="{{ csrf_token() }}">

Realiza suma
<input type="button" href="javascript:;" onclick="realizaProceso($('#valor1').val(), $('#valor2').val()); return false;" value="Calcula">

Resultado: <span id="resultado">0</span>
</body>
</html>