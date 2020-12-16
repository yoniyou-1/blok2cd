
$('.tipoestados_tipodocs').on('change', function () {

    var data = {
        tipoestado_id: $(this).data('tipoestadoid'),
        tipodoc_id: $(this).val(),
        _token: $('input[name=_token]').val()
    };
    if ($(this).is(':checked')) {
        data.estado = 1
    } else {
        data.estado = 0
    }
    ajaxRequest('/admin/tipoestado-tipodoc', data);
});

function ajaxRequest (url, data) {
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (respuesta) {
            Biblioteca.notificaciones(respuesta.respuesta, 'SAIR', 'success');
        }
    });
}