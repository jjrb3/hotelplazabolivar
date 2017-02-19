// Script por Stids S.A.S

function eliminar(id) {

    var botonSi = '<span onclick="confirmarEliminar('+id+')" style="cursor:pointer"><strong>AQUÍ</strong></span>';

    mensajeInformacion('mensaje','Si esta seguro que desea eliminar esta reserva presione '+botonSi);
}

function confirmarEliminar(id) {

    _ajax('inicio/eliminar','id='+id,'mensaje');
    buscar();
}

function buscar(pagina) {

    if (!pagina) {
        pagina = 1;
    }

    $.ajax({
        url: 'inicio/buscar',
        type: 'post',
        data: {
            buscar:$("#buscar").val(),
            pagina:pagina,
            tamanhioPagina:10,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        dataType: 'json',
        beforeSend: function(){
            $("#tabla").html('<center><img src="'+$("#ruta").val()+'tema/images/cargando.gif" width="50px"></center>');
        },
        success: function (data) {

            switch(data.resultado) {
                case 1:
                    var tabla = '';
                    var boton = '';

                    $('#tabla').html(tabla);   // Quitamos el cargando

                    // Titulo de la tabla
                    tabla += '<div class="table-responsive"><table class="table"><thead><tr><th>Titulo</th><th>Nombres</th><th>Apellidos</th><th>E-mail</th><th>Telefono</th><th>Entrada</th><th>Salida</th><th>habitacion</th><th>Precio</th><th>Opciones</th></tr></thead></div>';

                    // Datos de la tabla
                    jQuery.each(data.json.data, function(i, val) {

                        tabla += '<tbody><tr>';
                        tabla += '<td>'+val.titulo+'</td>';
                        tabla += '<td>'+val.nombres+'</td>';
                        tabla += '<td>'+val.apellidos+'</td>';
                        tabla += '<td>'+val.email+'</td>';
                        tabla += '<td>'+val.telefono+'</td>';
                        tabla += '<td>'+val.fecha_inicio+'</td>';
                        tabla += '<td>'+val.fecha_fin+'</td>';
                        tabla += '<td>'+val.habitacion+'</td>';
                        tabla += '<td>$'+val.valor.toLocaleString()+'</td>';
                        tabla += '<td style="text-align:center;"><a href="#" onclick="eliminar('+val.id+')"><span class="glyphicon glyphicon glyphicon-remove"></span></a></td>';
                        tabla += '</tr></tbody>';
                    });

                    tabla += '</table></div>';


                    $('#tabla').append(tabla);
                    mostrarPaginacion('paginacion','buscar',data.json.last_page,data.json.current_page);
                    break;
                case 0:
                    mensajeAdvertencia("tabla", data.mensaje);
                    break;
                case -1:
                    mensajeError("tabla", data.mensaje);
                    break;
            }
        },
        error: function(result) {
            mensajeError("tabla", 'Se encontraron errores al momento de procesar la solicitud');
        }
    });
}
