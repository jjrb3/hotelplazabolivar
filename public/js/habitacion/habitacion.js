// Script por Stids S.A.S

function deshabilitar(id) {

    var botonSi = '<span onclick="confirmarDeshabilitar('+id+')" style="cursor:pointer"><strong>AQUÍ</strong></span>';

    mensajeInformacion('mensaje','Si esta seguro que desea eliminar esta propiedad presione '+botonSi);
}

function confirmarDeshabilitar(id) {

    $.ajax({
        url: 'inicio/deshabilitar',
        type: 'post',
        data: {
            id:id
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        dataType: 'json',
        beforeSend: function(){
            $("#mensaje").html('<center><img src="' + $("#ruta").val() + 'tema/images/cargando.gif" width="50px"></center>');
        },
        success: function (data) {

            switch (data.resultado) {
                case 1:
                    mensajeRealizado("mensaje", data.mensaje);
                    buscar();
                    volver();
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

function crearActualizar(accion) {

    $.ajax({
        url: 'inicio/'+accion,
        type: 'post',
        data: jQuery("#fomulario").serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        dataType: 'json',
        beforeSend: function(){
            $("#mensaje").html('<center><img src="' + $("#ruta").val() + 'tema/images/cargando.gif" width="50px"></center>');
        },
        success: function (data) {

            switch (data.resultado) {
                case 1:
                    mensajeRealizado("mensaje", data.mensaje);
                    if (accion == 'registrar')
                    document.getElementById("fomulario").reset();
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

function llenarDatos() {

    $.ajax({
        url: 'inicio/buscar/id',
        type: 'post',
        data: {
            id:$("#id").val(),
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        dataType: 'json',
        beforeSend: function(){},
        success: function (data) {

            switch(data.resultado) {
                case 1:
                    $("#tipoHabitacion").val(data.json[0].id_tipo_habitacion);
                    $("#nombre").val(data.json[0].nombre);
                    $("#valor").val(data.json[0].valor);
                    $("#valorOferta").val(data.json[0].valor_oferta);
                    $("#cantidadHabitacion").val(data.json[0].cantidad_habitacion);
                    $("#direccion").val(data.json[0].direccion);
                    $("#cantidadAdultos").val(data.json[0].cantidad_adultos);
                    $("#cantidadMenores").val(data.json[0].cantidad_menores);
                    $("#horaEntrada").val(data.json[0].hora_entrada);
                    $("#horaSalida").val(data.json[0].hora_salida);
                    $("#gpsLatitud").val(data.json[0].latitud);
                    $("#gpsAltitud").val(data.json[0].altitud);
                    $("#descripcion").val(data.json[0].descripcion);
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
                    tabla += '<div class="table-responsive"><table class="table"><thead><tr><th>Nombre</th><th>Valor</th><th>Direccion</th><th>Hora Entrada</th><th>Hora Salida</th><th>Imagenes</th><th>Tipo de habitación</th><th>Servicios</th><th>Estado</th><th>Opciones</th></tr></thead></div>';

                    // Datos de la tabla
                    jQuery.each(data.json.data, function(i, val) {

                        tabla += '<tbody><tr>';
                        tabla += '<td>'+val.nombre+'</td>';
                        tabla += '<td>$'+val.valor.toLocaleString()+'</td>';
                        tabla += '<td>'+val.direccion+'</td>';
                        tabla += '<td>'+val.hora_entrada.substring(0, 5)+'</td>';
                        tabla += '<td>'+val.hora_salida.substring(0, 5)+'</td>';
                        tabla += '<td><a href="imagenes?id='+val.id+'">Ver Imagenes</a></td>';
                        tabla += '<td>'+val.tipo_habitacion+'</td>';
                        tabla += '<td><a href="servicios?id='+val.id+'">Ver Servicios</a></td>';

                        if (val.estado == 1) {
                            tabla += '<td>Activo</a>';
                        }
                        else {
                            tabla += '<td>Inactivo</a>';
                        }

                        tabla += '<td><a href="actualizar?id='+val.id+'"><span class="glyphicon glyphicon glyphicon-pencil"></span></a>  / ';
                        tabla += '<a href="#" onclick="deshabilitar('+val.id+')"><span class="glyphicon glyphicon glyphicon-remove"></span></a></td>';
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
