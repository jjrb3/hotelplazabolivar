<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class SesionController extends Controller
{
    public function CerrarSesion(Request $request)
    {
        $request->session()->flush();

        return redirect('/inicio');
    }

    public function VerificarUsuario(Request $request)
    {
        if (!$request->get('usuario')) {
            return response()->json(array(
                'resultado' => 0,
                'mensaje' => 'Debe ingresar el campo usuario para continuar',
            ));
        }

        if (!trim($request->get('clave'))) {
            return response()->json(array(
                'resultado' => 0,
                'mensaje' => 'Debe ingresar el campo contraseña para continuar',
            ));
        }

        try {
            $usuario = Usuario::where('usuario', '=', $request->get('usuario'))->
            where('clave', '=', md5($request->get('clave')))->get();


            if (count($usuario)) {

                $request->session()->put('idUsuario', $usuario[0]->id);
                $request->session()->put('nombres', $usuario[0]->nombres . ' ' . $usuario[0]->apellidos);

                return response()->json(array(
                    'resultado' => 1,
                    'mensaje' => 'Espere mientras es redirigido',
                ));
            } else {
                return response()->json(array(
                    'resultado' => 0,
                    'mensaje' => 'El usuario o clave no es correcto, vuelva a intentarlo',
                ));
            }
        } catch (Exception $e) {
            return response()->json(array(
                'resultado' => -2,
                'mensaje' => 'Grave error: ' . $e,
            ));
        }
    }
}
