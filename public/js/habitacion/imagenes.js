// Script por Stids S.A.S

function guardar() {

    $(document).ready(function(){

        var imagen = $("#archivo").val();

        if (imagen) {
            // Toma lo que contenga el formulario
            var formData = new FormData($("#imagen")[0]);

            $.ajax({
                url: 'imagenes/guardar',	// A que archivo se envian los datos
                type: 'POST',					// metodo POST
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    $("#mensaje").html('<center><img src="' + $("#ruta").val() + 'tema/images/cargando.gif" width="50px"></center>');
                },
                success: function(data){
                    mensajeRealizado("mensaje","Se subio la imagen correctamente");
                    buscar();
                },
                error: function(data){
                    mensajeError("mensaje","Se encontraron problemas al subir la imagen");
                }
            });
        }
        else {

            buscar();
        }
    });
}

function eliminar(id,ruta) {

    var botonSi = '<span onclick="confirmarEliminar('+id+',\''+ruta+'\')" style="cursor:pointer"><strong>AQUÍ</strong></span>';

    mensajeAdvertencia('mensaje','Si esta seguro que desea eliminar esta imagen presione '+botonSi);
}

function confirmarEliminar(id) {

    $.ajax({
        url: 'imagenes/eliminar',
        type: 'post',
        data: {
            id:id
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        dataType: 'json',
        beforeSend: function(){
            $("#galeria").html('<center><img src="'+$("#ruta").val()+'tema/images/cargando.gif" width="50px"></center>');
        },
        success: function (data) {

            switch (data.resultado) {
                case 1:
                    mensajeRealizado("mensaje", data.mensaje);
                    buscar();
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
            mensajeError("tabla", 'Se encontraron errores al momento de procesar la solicitud');
        }
    });
}

function buscar() {

    $.ajax({
        url: 'imagenes/buscar',
        type: 'post',
        data: {
            id:$("#id").val(),
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        dataType: 'json',
        beforeSend: function(){
            $("#galeria").html('<center><img src="'+$("#ruta").val()+'tema/images/cargando.gif" width="50px"></center>');
        },
        success: function (data) {

            switch(data.resultado) {
                case 1:
                    var tabla = '';
                    $('#galeria').html('');


                    jQuery.each(data.json, function(i, val) {

                        tabla = '<div class="col-sm-4"> <div class="panel panel-primary">';
                        tabla += '<div class="panel-heading" style="background-color: #e86850">Imagen</div>';
                        tabla += '<div class="panel-body">';
                        tabla += '<img src="'+$("#ruta").val()+'recursos/imagen_habitacion/'+val.ruta+'" style="width:300px;height:300px">'
                        tabla += '<br><br><button onclick="eliminar('+val.id+')" class="btn btn-danger">Eliminar</button>';
                        tabla += '</div></div>';

                        $('#galeria').append(tabla);
                    });
                    break;
                case 0:
                    mensajeAdvertencia("galeria", data.mensaje);
                    break;
                case -1:
                    mensajeError("galeria", data.mensaje);
                    break;
            }
        },
        error: function(result) {
            mensajeError("tabla", 'Se encontraron errores al momento de procesar la solicitud');
        }
    });
}
