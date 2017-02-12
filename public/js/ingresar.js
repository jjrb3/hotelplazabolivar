
$.ajaxSetup({  
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  
	}  
});

function verificarIngreso(id,estado) {

    $.post('ingresar/verificar',{usuario:$("#usuario").val(),
                                 clave:$("#clave").val()}, function (data) {

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
    },'json');
}
