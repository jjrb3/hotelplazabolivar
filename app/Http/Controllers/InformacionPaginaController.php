<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\InformacionPagina;

class InformacionPaginaController extends Controller
{
    public static function ConsultarInformacionPagina() {
        try {
            return InformacionPagina::where('id','=','1')->get()->toArray();
        } catch (Exception $e) {
            return 'Grave error: ' . $e;
        }
    }

    public function ActualizarInformacionPagina(Request $request)
    {
        $informacionPagina = InformacionPagina::Find($request->get('id'));

        $informacionPagina->telefono        = $request->get('telefono');
        $informacionPagina->correo_contacto = $request->get('correo');
        $informacionPagina->direccion       = $request->get('direccion');
        $informacionPagina->ciudad          = $request->get('ciudad');
        $informacionPagina->nosotros        = $request->get('nosortos');
        $informacionPagina->que_hacemos      = $request->get('queHacemos');
        $informacionPagina->mision          = $request->get('mision');
        $informacionPagina->vision          = $request->get('vision');
        $informacionPagina->valores         = $request->get('valores');

        try {
            if ($informacionPagina->save()) {
                return response()->json(array(
                    'resultado' => 1,
                    'mensaje' => 'Se actualizó la informacion de la pagina correctamente',
                ));
            } else {
                return response()->json(array(
                    'resultado' => 0,
                    'mensaje' => 'Se encontraron problemas al actualizar la información de la pagina',
                ));
            }
        } catch (Exception $e) {
            return response()->json(array(
                'resultado' => -1,
                'mensaje' => 'Grave error: ' . $e,
            ));
        }

    }
}
