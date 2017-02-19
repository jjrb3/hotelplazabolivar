
var url = 'administrador/reserva/inicio/';
var id = 'mensaje';


$('#fechaInicio').blur( function() {
    verificarFechas(jQuery('#fechaInicio').val());
});

$('#fechaFin').blur( function() {
    verificarFechas(jQuery('#fechaFin').val());
});


$('#guardar').click(function(){
    _ajax(url+'guardar',jQuery("#fomulario").serialize(),id);
});


// Funciones
function verificarFechas(fecha) {
    _ajax(url+'existeReserva','fecha='+fecha+'&idHabitacion='+$('#idHabitacion').val(),id);
}
