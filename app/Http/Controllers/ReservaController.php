<?php

namespace App\Http\Controllers;

use App\Reserva;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class ReservaController extends Controller
{
    public function ExisteReserva(Request $request)
    {
        try {
            $reserva = Reserva::where('fecha_fin','>=',$request->get('fecha'))
                ->where('fecha_inicio','<=',$request->get('fecha'))
                ->where('id_habitacion','=',$request->get('idHabitacion'))
                ->count();

            if ($reserva == 0) {
                return response()->json(array(
                    'resultado' => 1,
                    'mensaje'   => 'Hay habitaciones disponibles para la fecha seleccionada',
                ));
            }
            else{
                return response()->json(array(
                    'resultado' => 0,
                    'mensaje'   => 'No hay habitaciones disponibles para la fecha seleccionada',
                ));
            }
        }
        catch (Exception $e) {
            return response()->json(array(
                'resultado' => -1,
                'mensaje'   => 'Grave error: ' . $e,
            ));
        }
    }


    public function Guardar(Request $request)
    {
        if ($this->verificacion($request))
            return $this->verificacion($request);


        $reserva = $this->insertarCampos(new Reserva(),$request);

        $mensaje = ['Se realizó la reserva correctamente',
                    'Se encontraron problemas al realizar la reserva'];

        return HerramientasStidsController::ejecutarSave($reserva,$mensaje);
    }


    private function insertarCampos($clase,$request) {

        $clase->id_titulo       = $request->get('titulo');
        $clase->id_habitacion   = $request->get('idHabitacion');
        $clase->nombres         = $request->get('nombres');
        $clase->apellidos       = $request->get('apellidos');
        $clase->email           = $request->get('email');
        $clase->telefono        = $request->get('telefono');
        $clase->fecha_inicio    = $request->get('fechaInicio');
        $clase->fecha_fin       = $request->get('fechaFin');

        return $clase;
    }


    function verificacion($request){

        $campos = array(
            'titulo' => 'Debe seleccionar el campo titulo para continuar',
            'nombres' => 'Debe digitar el campo nombres para continuar',
            'apellidos' => 'Debe digitar el campo apellidos para continuar',
            'telefono' => 'Debe digitar el campo telefono para continuar',
            'fechaInicio' => 'Debe digitar el campo fecha inicio para continuar',
            'fechaFin' => 'Debe digitar el campo fecha fin para continuar',
            'email' => 'Debe digitar el campo email para continuar',
        );

        foreach ($campos as $campo => $mensaje) {

            $resultado = HerramientasStidsController::verificacionCampos($request,$campo,$mensaje);

            if ($resultado) {
                return $resultado;
            }
        }
    }
}
