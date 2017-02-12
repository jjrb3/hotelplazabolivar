/**
 * Created by JeremyJosé on 15/01/2017.
 */

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function actualizar() {

    $(document).ready(function () {

        $("#mensaje").html('<center><img src="' + $("#ruta").val() + 'tema/images/cargando.gif" width="50px"></center>');

        $.post('inicio/actualizar',{id: $("#idInformacion").val(),
                                    telefono: $("#telefono").val(),
                                    correo: $("#correo").val(),
                                    direccion: $("#direccion").val(),
                                    ciudad: $("#ciudad").val(),
                                    nosortos: $("#quienesSomos").val(),
                                    queHacemos: $("#queHacemos").val(),
                                    mision: $("#mision").val(),
                                    vision: $("#vision").val(),
                                    valores: $("#valores").val()
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