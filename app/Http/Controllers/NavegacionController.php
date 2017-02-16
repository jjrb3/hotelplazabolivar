<?php

namespace App\Http\Controllers;

use App\TipoHabitacion;
use App\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class NavegacionController extends Controller
{
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
        $habitaciones = array();

        $directorio = opendir("recursos/imagen_slider");

        while ($archivo = readdir($directorio))
        {
            if (!is_dir($archivo))
            {
                $imagenSlider[] = $archivo;
            }
        }

        $habitacion = new HabitacionController();

        if ($request->get('tipoHabitacion')) {
            $habitaciones = $habitacion->Consultar($request)[0];
        }

        return View($pagina,
            [
                'imagenSlider' => $imagenSlider,
                'informacionPagina' => InformacionPaginaController::ConsultarInformacionPagina(),
                'tipoHabitacion' => TipoHabitacionController::Consultar(),
                'habitaciones' => $habitaciones,
            ]);
    }
}
