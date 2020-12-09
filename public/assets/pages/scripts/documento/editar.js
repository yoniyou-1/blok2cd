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


/*var checkp = $('input:text[id=identificador]').val();
alert(checkp);


var map = {};
$(".aaa").each(function() {
       map[$(this).attr("id")] = $(this).val();
});

alert(map.state0); // "red"*/

$(function() {
    var map = {};
    $(".stateClass").each(function() {
        map[$(this).attr("id")] = $(this).val();
    });
    
    console.log(Object.values(map));
    i=0;
$.each( map, function( key, value ) {
    
    if(value==1){
        //alert("ii"+i+"cc");
        var nuevoCSS = {  "background-color": '#4aca65',"border-color": '#43b45b' };
    $('.bb'+i).prev().html('<svg id="i-checkmark" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="10.9375%"><path d="M2 20 L12 28 30 4" /></svg>').css(nuevoCSS).addClass('positive');
  //alert( key + ": " + value );
    }
    if(value==2){
        var nuevoCSS = {  "background-color": '#dc4e4e',"border-color": '#c74545' };
    $('.bb'+i).prev().html('<svg id="i-close" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="10.9375%"><path d="M2 30 L30 2 M30 30 L2 2" /></svg>').css(nuevoCSS).addClass('negative');
    }
    if(value==0){
        var nuevoCSS = {  "background-color": '#fff',"border-color": '#d7d7d7' };
    $('.bb'+i).prev().html('').css(nuevoCSS);
    }
i++;
});
});
                        $('.checkbox').click(function(){
                      if ($(this).hasClass('positive')){
                        $(this).removeClass('positive');
                        $(this).addClass('negative');
                        var nuevoCSS = {  "background-color": '#dc4e4e',"border-color": '#c74545' };
                        $(this).html('<svg id="i-close" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="10.9375%"><path d="M2 30 L30 2 M30 30 L2 2" /></svg>').css(nuevoCSS);
                        $(this).next().val('2');
                      } else if ($(this).hasClass('negative')){
                        $(this).removeClass('negative');
                        var nuevoCSS = {  "background-color": '#fff',"border-color": '#d7d7d7' };
                        $(this).html('').css(nuevoCSS);
                        $(this).next().val('0');
                      } else {
                        $(this).addClass('positive');
                        var nuevoCSS = {  "background-color": '#4aca65',"border-color": '#43b45b' };
                        $(this).html('<svg id="i-checkmark" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="10.9375%"><path d="M2 20 L12 28 30 4" /></svg>').css(nuevoCSS);
                        $(this).next().val('1');
                    
                      }
                    });



                        //fin de checkbox triple




       // Start from 1
       //alert(t);
        //var i = 0;
        // When button clicked
        $('.addmore').click(function(){
            //alert('esto es i : '+i);
            var countarrayviejo = $('input#countarrayviejo').val();
            //alert('addv'+countarrayviejo);
            var countarraynuevo = parseInt(countarrayviejo)+1;
            //alert('addn'+countarraynuevo);
            $("#countarrayviejo").val(countarraynuevo);
            
            var i = parseInt(countarraynuevo);
            
            // add the following layout
            $('#dynamicFields').append(
              '<div class="row removing'+i+'"><div class="col-2"><div class="d-flex"><div class="p-1">'
              +
              '<label class="showName p-2" for="date"> Fechas</label>'
              +
              '</div></div></div>'
              +
              '<div class="col-4"> <div class="d-flex"><div class="flex-fill p-2">'
              +
              '<input class="form-control showName" type="datetime-local" name="fechaini['+i+']" required>'
              +
              '</div></div> </div>'
              +
              '<div class="col-4"> <div class="d-flex"><div class="flex-fill p-2">'
              +
              '<input class="form-control showName" type="datetime-local" name="fechafin['+i+']" required>'
              +
              '</div></div> </div>'
              +
              '</div>'
              +
              '<div class="row removing'+i+' showName" style="margin: 10px;">'
              +
              '<div class="col-4 offset-4">'
              +
              '<input type="button" class="btn btn-danger btn-block remove-fields delfecha" id="removing'+i+'" name="delfecha'+i+'"  value="Remover Fecha">'
              
              +
              '</div>'
              +
              '</div>');
            //i++;

            });
        // Removing fields


         //$(document).on('click', 'input[type="button"]', function(event) {
        //$('input.delfecha').click(function(){
            $(document).on('click', '.delfecha', function(){
            let id = this.id;
            console.log("Se presionó el Boton con Id :"+ id);
            $('.'+id).remove();





          });








});



