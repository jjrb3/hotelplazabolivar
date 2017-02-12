// Script por Stids S.A.S

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){

    $('#fomrUsuario').submit(function(){

        $("#mensaje").html('<center><img src="'+$("#ruta").val()+'tema/images/cargando.gif" width="50px"></center>');


        $.post('inicio/registrar',{   usuario:$("#usuario").val(),
                                            clave:$("#clave").val(),
                                            nombres:$("#nombres").val(),
                                            apellidos:$("#apellidos").val(),
                                            email:$("#email").val()},function(data){

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
        },'json');
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

    $(document).ready(function () {
        $.post('inicio/deshabilitar',{id:id,estado:estado}, function (data) {

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
        },'json');
    });
}

function actualizar() {

    $(document).ready(function () {

        $("#mensaje").html('<center><img src="' + $("#ruta").val() + 'tema/images/cargando.gif" width="50px"></center>');

        $.post('inicio/actualizar',{id: $("#usuarioId").val(),
                                    usuario: $("#usuarioActualizar").val(),
                                    clave: $("#claveActualizar").val(),
                                    nombres: $("#nombresActualizar").val(),
                                    apellidos: $("#apellidosActualizar").val(),
                                    email: $("#emailActualizar").val()
                                    }, function (data) {

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
        },'json');
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

    $(document).ready(function(){
        $("#fomrUsuario").slideUp(500,function(){
            $.post('inicio/buscar/id',{id:id},function(data){
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
            },'json');
            $("#fomrUsuarioActualizar").slideDown(500);
        });
    });
}

function buscarUsuario() {

    $(document).ready(function(){

        $("#tabla").html('<center><img src="'+$("#ruta").val()+'tema/images/cargando.gif" width="50px"></center>');

        $.post('inicio/buscar',{},function(data){

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
        },'json');
    });
}
