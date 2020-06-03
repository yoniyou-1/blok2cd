$(document).ready(function () {
    Biblioteca.validacionGeneral('form-general');
    $('#icon').on('blur', function () {
        $('#mostrar-icono').removeClass().addClass('fa fa-fw ' + $(this).val());
    });
});