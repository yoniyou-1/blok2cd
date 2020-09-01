$(document).ready(function () {
    Biblioteca.validacionGeneral('form-general');
    $('#name').on('change',function(){
        $('#slug').val($(this).val().toLowerCase().replace(/ /g, '-'))
    })
});