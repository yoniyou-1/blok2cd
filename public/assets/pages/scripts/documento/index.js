$(document).ready(function () {
    $("#tabla-data").on('submit', '.form-eliminar', function (event) {
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿ Está seguro que desea eliminar el registro ?',
            text: "Esta acción no se puede deshacer!",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
                ajaxRequest(form.serialize(), form.attr('action'), 'eliminarDocumento', form);
            }
        });
    });
function myFunction() {
  window.alert("Hello world!");
}
    $('#tabla-data').on('click','.ver-documento',function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        const data = {
            _token: $('input[name=_token]').val()
        }
        ajaxRequest(data, url, 'verDocumento');
    });

    function ajaxRequest(data, url, funcion, form = false) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (respuesta) {
                if (funcion == 'eliminarDocumento') {
                    if (respuesta.mensaje == "ok") {
                        form.parents('tr').remove();
                        Biblioteca.notificaciones('El registro fue eliminado correctamente', 'SAIR', 'success');
                    } else {
                        Biblioteca.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'SAIR', 'error');
                    }
                } else if (funcion == 'verDocumento') {
                    $('#modal-ver-documento .modal-body').html(respuesta)
                    $('#modal-ver-documento').modal('show');
                }
            },
            error: function () {

            }
        });
    }
});