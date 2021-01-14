
$('.tipofechas_tipodocs').on('change', function () {

    var data = {
        tipofecha_id: $(this).data('tipofechaid'),
        tipodoc_id: $(this).val(),
        _token: $('input[name=_token]').val()
    };
    if ($(this).is(':checked')) {
        data.estado = 1
    } else {
        data.estado = 0
    }
    ajaxRequest('/admin/tipofecha-tipodoc', data);
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