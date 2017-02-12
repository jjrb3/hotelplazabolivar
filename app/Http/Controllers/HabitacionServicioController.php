<?php

namespace App\Http\Controllers;

use App\HabitacionServicio;
use App\Servicio;
use App\Imagen;
use Illuminate\Http\Request;


class HabitacionServicioController extends Controller
{
    public function Consultar(Request $request)
    {
        try {

            $sql = HabitacionServicio::select('s_habitacion_servicio.*','s_servicio.nombre as servicio','s_servicio.icono as icono_servicio')
                ->join('s_servicio','s_habitacion_servicio.id_servicio','=','s_servicio.id')
                ->where('s_habitacion_servicio.id_habitacion', '=', $request->get('id'))
                ->where('s_servicio.estado', '=', '1')
                ->orderBy('s_servicio.nombre', 'ASC')->get();

            if (count($sql)) {
                return response()->json(array(
                    'resultado' => 1,
                    'mensaje'   => 'Se econtraron datos',
                    'json'      => $sql
                ));
            }
            else {
                return response()->json(array(
                    'resultado' => 0,
                    'mensaje'   => 'No se encontraron resultados para la consulta',
                ));
            }
        }
        catch (Exception $e) {
            return response()->json(array(
                'resultado' => -2,
                'mensaje'   => 'Grave error: ' . $e,
            ));
        }
    }

    public function Guardar(Request $request)
    {
        if (HabitacionServicio::where('id_habitacion', '=', $request->get('id'))->delete()) {

            $idServicio = array_filter(explode(",", $request->get('ids')));

            foreach ($idServicio as $id) {

                $habitacionServicio = new HabitacionServicio;
                $habitacionServicio->id_habitacion = $request->get('id');
                $habitacionServicio->id_servicio = $id;

                try {
                    if (!$habitacionServicio->save()) {
                        return response()->json(array(
                            'resultado' => 0,
                            'mensaje' => 'Se encontraron problemas al guardar los servicios',
                        ));
                    }
                } catch (Exception $e) {
                    return response()->json(array(
                        'resultado' => -1,
                        'mensaje' => 'Grave error: ' . $e,
                    ));
                }
            }

            return response()->json(array(
                'resultado' => 1,
                'mensaje' => 'Se guardaron los servicios correctamente',
            ));
        }
        else {
            return response()->json(array(
                'resultado' => 0,
                'mensaje' => 'Se encontraron problemas al guardar los servicios',
            ));
        }
    }
}
