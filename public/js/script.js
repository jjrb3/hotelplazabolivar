var codigoMensaje = '';

function validarCorreo(email) {

	if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email)){
		
   		return true;
  	} 
  	else {
   		return false;
  	}
}

function mostrarPaginacion(div,metodoJS,cantidad,paginaActual) {

    var paginacion = '';
    var anterior = '';
    var siguiente = '';
    var activo = '';

    if (paginaActual - 1 > 0) {

        paginacion = '<li><a style="cursor:pointer;" onclick="'+metodoJS+'('+(paginaActual - 1)+')">«</a></li>';
	}

    for (var i=1;i<=cantidad;i++) {

    	if (i == paginaActual) {
    		activo = ' class="active" '
		}
		else {
    		activo = '';
		}
		paginacion += '<li '+activo+'><a style="cursor:pointer;" onclick="'+metodoJS+'('+i+')">'+i+'</a></li>';
	}

    if (paginaActual + 1 <= cantidad) {

        paginacion += '<li><a style="cursor:pointer;" onclick="'+metodoJS+'(' + (paginaActual + 1) + ')">»</a></li>';
    }

	$("#"+div).html(paginacion);
}

function cargar(div) {

	$("#"+div).html('<center><img src="../img/cargando.gif" width="50px"><br><br></center>');
}

function mensajeError(id,mensaje){

	codigoMensaje  = '<div class="alert alert-dismissable alert-danger">';
	codigoMensaje += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
	codigoMensaje += '<center>';
	codigoMensaje += '<i class="glyphicon glyphicon-exclamation-sign" style="font-size: 30px"></i> ';
	codigoMensaje += '<br>';
	codigoMensaje += mensaje;
	codigoMensaje += '</center>';
	codigoMensaje += '</div>';

	$("#"+id).html(codigoMensaje);
}

function mensajeRealizado(id,mensaje){

	codigoMensaje  = '<div class="alert alert-dismissable alert-success">';
	codigoMensaje += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
	codigoMensaje += '<center>';
	codigoMensaje += '<i class="glyphicon glyphicon-ok-sign" style="font-size: 30px"></i> ';
	codigoMensaje += '<br>';
	codigoMensaje += mensaje;
	codigoMensaje += '</center>';
	codigoMensaje += '</div>';

	$("#"+id).html(codigoMensaje);
}


function mensajeAdvertencia(id,mensaje){

	codigoMensaje  = '<div class="alert alert-dismissable alert-warning">';
	codigoMensaje += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
	codigoMensaje += '<center>';
	codigoMensaje += '<i class="glyphicon glyphicon-exclamation-sign" style="font-size: 30px"></i> ';
	codigoMensaje += '<br>';
	codigoMensaje += mensaje;
	codigoMensaje += '</center>';
	codigoMensaje += '</div>';

	$("#"+id).html(codigoMensaje);
}

function mensajeInformacion(id,mensaje){

	codigoMensaje  = '<div class="alert alert-dismissable alert-info">';
	codigoMensaje += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
	codigoMensaje += '<center>';
	codigoMensaje += '<i class="glyphicon glyphicon-info-sign" style="font-size: 30px"></i> ';
	codigoMensaje += '<br>';
	codigoMensaje += mensaje;
	codigoMensaje += '</center>';
	codigoMensaje += '</div>';

	$("#"+id).html(codigoMensaje);
}