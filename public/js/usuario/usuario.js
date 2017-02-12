// Script por Stids S.A.S

$('#fomrUsuario').submit(function(){

    $.ajax({
        url: 'inicio/registrar',
        type: 'post',
        data: {
            usuario:$("#usuario").val(),
            clave:$("#clave").val(),
            nombres:$("#nombres").val(),
            apellidos:$("#apellidos").val(),
            email:$("#email").val(),
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        beforeSend: function(){
            $("#mensaje").html('<center><img src="'+$("#ruta").val()+'tema/images/cargando.gif" width="50px"></center>');
        },
        dataType: 'json',
        success: function (data) {

            switch(data.resultado) {
                case 1:
                    mensajeRealizado("mensaje",data.mensaje);
                    buscarUsuario();
                    document.getElementById("fomrUsuario").reset();
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
});

function deshabilitar(id) {

    var botonSi = '<span onclick="confirmarDeshabilitar('+id+',\'0\')" style="cursor:pointer"><strong>AQUÍ</strong></span>';

    mensajeInformacion('mensaje','Si esta seguro que desea deshabilitar este usuario presione '+botonSi);
}

function habilitar(id) {

    var botonSi = '<span onclick="confirmarDeshabilitar('+id+',\'1\')" style="cursor:pointer"><strong>AQUÍ</strong></span>';

    mensajeInformacion('mensaje','Si esta seguro que desea habilitar este usuario presione '+botonSi);
}

function confirmarDeshabilitar(id,estado) {

    $.ajax({
        url: 'inicio/deshabilitar',
        type: 'post',
        data: {
            id:id,
            estado:estado,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        dataType: 'json',
        success: function (data) {
            switch (data.resultado) {
                case 1:
                    mensajeRealizado("mensaje", data.mensaje);
                    buscarUsuario();
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
            mensajeError("mensaje", 'Se encontraron errores al momento de procesar la solicitud');
        }
    });
}

function actualizar() {

    $.ajax({
        url: 'inicio/actualizar',
        type: 'post',
        data: {
            id: $("#usuarioId").val(),
            usuario: $("#usuarioActualizar").val(),
            clave: $("#claveActualizar").val(),
            nombres: $("#nombresActualizar").val(),
            apellidos: $("#apellidosActualizar").val(),
            email: $("#emailActualizar").val(),
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
                    buscarUsuario();
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
            mensajeError("mensaje", 'Se encontraron errores al momento de procesar la solicitud');
        }
    });
}

function volver() {

    $("#fomrUsuarioActualizar").slideUp(500,function(){
        $("#usuarioActualizar").val('');
        $("#claveActualizar").val('');
        $("#nombresActualizar").val('');
        $("#apellidosActualizar").val('');
        $("#emailActualizar").val('');
        $("#fomrUsuario").slideDown(500);
    });
}

function formularioActualizar(id) {

    $("#fomrUsuario").slideUp(500,function(){
        $.ajax({
            url: 'inicio/buscar/id',
            type: 'post',
            data: {
                id:id,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            dataType: 'json',
            beforeSend: function(){},
            success: function (data) {

                switch(data.resultado) {
                    case 1:
                        $("#usuarioId").val(data.json[0].id);
                        $("#usuarioActualizar").val(data.json[0].usuario);
                        $("#claveActualizar").val('');
                        $("#nombresActualizar").val(data.json[0].nombres);
                        $("#apellidosActualizar").val(data.json[0].apellidos);
                        $("#emailActualizar").val(data.json[0].correo);
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
        $("#fomrUsuarioActualizar").slideDown(500);
    });
}

function buscarUsuario() {

    $.ajax({
        url: 'inicio/buscar',
        type: 'post',
        data: {},
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
                    tabla += '<div class="table-responsive"><table class="table"><thead><tr><th>Usuario</th><th>Nombres</th><th>Apellidos</th><th>Email</th><th>Estado</th><th>Opciones</th></tr></thead></div>';

                    // Datos de la tabla
                    jQuery.each(data.json, function(i, val) {
                        tabla += '<tbody><tr>';
                        tabla += '<td>'+val.usuario+'</td>';
                        tabla += '<td>'+val.nombres+'</td>';
                        tabla += '<td>'+val.apellidos+'</td>';
                        tabla += '<td>'+val.correo+'</td>';
                        if(val.estado == 1) {
                            tabla = tabla + '<td>Activo</td>';
                            boton =  '<a href="#" onclick="deshabilitar('+val.id+')"><span class="glyphicon glyphicon glyphicon-remove"></span></a></td>';
                        }
                        else {
                            tabla = tabla + '<td>Inactivo</td>';
                            boton =  '<a href="#" onclick="habilitar('+val.id+')"><span class="glyphicon glyphicon glyphicon-check"></span></a></td>';
                        }
                        tabla += '<td><a href="#" onclick="formularioActualizar('+val.id+')"><span class="glyphicon glyphicon glyphicon-pencil"></span></a>  / ';
                        tabla += boton;
                        tabla += '</tr></tbody>';
                    });

                    tabla += '</table></div>';


                    $('#tabla').append(tabla);

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
            mensajeError("mensaje", 'Se encontraron errores al momento de procesar la solicitud');
        }
    });
}
