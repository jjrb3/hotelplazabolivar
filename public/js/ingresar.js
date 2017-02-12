
function verificarIngreso(id,estado) {

    $.ajax({
        url: 'ingresar/verificar',
        type: 'post',
        data: {
            usuario:$("#usuario").val(),
            clave:$("#clave").val()
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            usuario:$("#usuario").val(),
            clave:$("#clave").val()
        },
        dataType: 'json',
        success: function (data) {
            switch (data.resultado) {
                case 1:
                    mensajeRealizado("mensaje", data.mensaje);
                    location.assign('administrador/inicio');
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
