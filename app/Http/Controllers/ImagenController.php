<?php

namespace App\Http\Controllers;

use App\Imagen;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class ImagenController extends Controller
{
    public function Consultar(Request $request)
    {
        try {
            $imagen = Imagen::where('id_habitacion', '=', $request->get('id'))->get();

            if (count($imagen)) {
                return response()->json(array(
                    'resultado' => 1,
                    'mensaje'   => 'Se econtraron datos',
                    'json'      => $imagen
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

    public function Eliminar(Request $request)
    {
        try {
            if (Imagen::where('id', '=', $request->get('id'))->delete()) {

                @unlink('recursos/imagen_habitacion/'.$request->get('ruta')); // Eliminamos la imagen

                return response()->json(array(
                    'resultado' => 1,
                    'mensaje' => 'Se eliminó la imagen correctamente',
                ));
            } else {
                return response()->json(array(
                    'resultado' => 0,
                    'mensaje' => 'Se encontraron problemas al eliminar la imagen',
                ));
            }
        } catch (Exception $e) {
            return response()->json(array(
                'resultado' => -1,
                'mensaje' => 'Grave error: ' . $e,
            ));
        }
    }

    public function Guardar(Request $request)
    {
        //$directorio = '/home/conip4lc/public_html/recursos/imagen_inmueble/';
        $directorio = 'recursos/imagen_habitacion/';
        $archivo = $request->file('imagen');
        $nombre = explode('.',$archivo->getClientOriginalName());
        $ext = $nombre[1];
        $nombreArchivo = $request->session()->get('idUsuario'). "_" . date("Ymd_his") . ".$ext";

        if($archivo->move($directorio, $nombreArchivo)) {

            $imagen = new Imagen;
            $imagen->id_habitacion = $request->get('id');
            $imagen->ruta = $nombreArchivo;

            try {
                if ($imagen->save()) {
                    return 1;
                } else {
                    return 0;
                }
            } catch (Exception $e) {
                return -1;
            }
        }
        else{

            return 0;
        }
    }
}
