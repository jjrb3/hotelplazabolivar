<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HerramientasStidsController extends Controller
{
    public static function ejecutarSave($clase,$mensaje) {
        try {
            if ($clase->save()) {
                return response()->json(array(
                    'resultado' => 1,
                    'mensaje' => $mensaje[0],
                ));
            } else {
                return response()->json(array(
                    'resultado' => 0,
                    'mensaje' => $mensaje[1],
                ));
            }
        } catch (Exception $e) {
            return response()->json(array(
                'resultado' => -1,
                'mensaje' => 'Grave error: ' . $e,
            ));
        }
    }

    public static function verificacionCampos($request,$nombre,$mensaje){
        if (!$request->get($nombre)) {
            return response()->json(array(
                'resultado' => 0,
                'mensaje' => $mensaje,
            ));
        }
    }
}
