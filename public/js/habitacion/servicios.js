/**
 * Created by Jose Barrios on 12/02/2017.
 */

// Script por Stids S.A.S

function guardar() {

    var ids = "";
    $('input[name="servicios[]"]:checked').each(function() {
        ids += $(this).val() + ",";
    });

    $.ajax({
        url: 'servicios/guardar',
        type: 'post',
        data: {
            id:$("#id").val(),
            ids:ids,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        dataType: 'json',
        beforeSend: function(){
            $("#mensaje").html('<center><img src="'+$("#ruta").val()+'tema/images/cargando.gif" width="50px"></center>');
        },
        success: function (data) {

            switch(data.resultado) {
                case 1:
                    mensajeRealizado("mensaje", data.mensaje);
                    break;
                case 0:
                    mensajeAdvertencia("mensaje", data.mensaje);
                    break;
                case -1:
                    mensajeError("mensaje", data.mensaje);
                    break;
            }
        },
        error: function(result) {
            mensajeError("mensaje", 'Se encontraron errores al momento de procesar la solicitud');
        }
    });
}

function buscar() {

    $.ajax({
        url: 'servicios/buscar',
        type: 'post',
        data: {
            id:$("#id").val(),
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        dataType: 'json',
        beforeSend: function(){
            $("#mensaje").html('<center><img src="'+$("#ruta").val()+'tema/images/cargando.gif" width="50px"></center>');
        },
        success: function (data) {

            switch(data.resultado) {
                case 1:
                    jQuery.each(data.json, function(i, val) {
                        $('#servicios'+val.id_servicio).prop('checked', true);
                    });
                    jQuery('#mensaje').html('');
                    break;
                case 0:
                    mensajeAdvertencia("mensaje", data.mensaje);
                    break;
                case -1:
                    mensajeError("mensaje", data.mensaje);
                    break;
            }
        },
        error: function(result) {
            mensajeError("mensaje", 'Se encontraron errores al momento de procesar la solicitud');
        }
    });
}
