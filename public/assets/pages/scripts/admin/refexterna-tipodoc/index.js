
$('.refexternas_tipodocs').on('change', function () {

    var data = {
        refexterna_id: $(this).data('refexternaid'),
        tipodoc_id: $(this).val(),
        _token: $('input[name=_token]').val()
    };
    if ($(this).is(':checked')) {
        data.estado = 1
    } else {
        data.estado = 0
    }
    ajaxRequest('/admin/refexterna-tipodoc', data);
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