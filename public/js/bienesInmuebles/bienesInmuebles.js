// Script por Stids S.A.S

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function deshabilitar(id) {

    var botonSi = '<span onclick="confirmarDeshabilitar('+id+')" style="cursor:pointer"><strong>AQUÍ</strong></span>';

    mensajeInformacion('mensaje','Si esta seguro que desea eliminar esta propiedad presione '+botonSi);
}

function confirmarDeshabilitar(id) {

    $(document).ready(function () {
        $.post('inicio/deshabilitar',{id:id}, function (data) {

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
        },'json');
    });
}

function crearActualizar(accion) {

    $(document).ready(function () {

        $("#mensaje").html('<center><img src="' + $("#ruta").val() + 'tema/images/cargando.gif" width="50px"></center>');

        $.post('inicio/'+accion,$("#fomulario").serialize(), function (data) {

            switch (data.resultado) {
                case 1:
                    mensajeRealizado("mensaje", data.mensaje);
                    document.getElementById("fomulario").reset();
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

function llenarDatos() {
    $(document).ready(function(){
        $.post('inicio/buscar/id',{id:$("#id").val()},function(data){

            switch(data.resultado) {
                case 1:
                    $("#nombre").val(data.json[0].nombre);
                    $("#contacto").val(data.json[0].contacto);
                    $("#valor").val(data.json[0].valor);
                    $("#direccion").val(data.json[0].direccion);
                    $("#estado").val(data.json[0].id_estado_inmueble);
                    $("#descripcion").val(data.json[0].descripcion);
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


function buscar(pagina) {

    $(document).ready(function(){

        $("#tabla").html('<center><img src="'+$("#ruta").val()+'tema/images/cargando.gif" width="50px"></center>');

        if (!pagina) {
            pagina = 1;
        }

        $.post('inicio/buscar',{buscar:$("#buscar").val(),
                                pagina:pagina,
                                tamanhioPagina:10},function(data){

            switch(data.resultado) {
                case 1:
                    var tabla = '';
                    var boton = '';

                    $('#tabla').html(tabla);   // Quitamos el cargando

                    // Titulo de la tabla
                    tabla += '<div class="table-responsive"><table class="table"><thead><tr><th>Nombre</th><th>Valor</th><th>Descripción</th><th>Direccion</th><th>Contacto</th><th>Imagenes</th><th>Estado</th><th>Opciones</th></tr></thead></div>';

                    // Datos de la tabla
                    jQuery.each(data.json.data, function(i, val) {

                        tabla += '<tbody><tr>';
                        tabla += '<td>'+val.nombre+'</td>';
                        tabla += '<td>$'+val.valor.toLocaleString()+'</td>';
                        tabla += '<td><a href="actualizar?id='+val.id+'">Ver descripción</a></td>';
                        tabla += '<td>'+val.direccion+'</td>';
                        tabla += '<td>'+val.contacto+'</td>';
                        tabla += '<td><a href="imagenes?id='+val.id+'">Ver Imagenes</a></td>';
                        tabla += '<td>'+val.estado_inmueble+'</td>';
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
        },'json');
    });
}
