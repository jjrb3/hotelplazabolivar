<?php

namespace App\Http\Controllers;

use App\TipoHabitacion;
use App\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class NavegacionController extends Controller
{
    var $seleccion	= ' class="active" ';
    var $menu 		= "";

    public function Administrador(Request $request,$carpeta,$pagina) {

        return !$request->session()->get('nombres') ? redirect('/inicio') : View("$carpeta.$pagina",
            [
                'nombres' => $request->session()->get('nombres'),
                'informacionPagina' => InformacionPaginaController::ConsultarInformacionPagina(),
                'tipoHabitacion' => TipoHabitacionController::Consultar(),
                'servicios' => ServicioController::Consultar()
            ]);
    }

    public function Usuario(Request $request,$pagina) {

        $imagenSlider = array();

        $directorio = opendir("recursos/imagen_slider");

        while ($archivo = readdir($directorio))
        {
            if (!is_dir($archivo))
            {
                $imagenSlider[] = $archivo;
            }
        }

        $habitacion = new HabitacionController();

        return View($pagina,
            [
                'imagenSlider' => $imagenSlider,
                'informacionPagina' => InformacionPaginaController::ConsultarInformacionPagina(),
                'tipoHabitacion' => TipoHabitacionController::Consultar(),
                'habitacion' => $habitacion->Consultar($request),
            ]);
    }
}
