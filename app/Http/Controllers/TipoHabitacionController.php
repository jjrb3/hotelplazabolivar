<?php

namespace App\Http\Controllers;

use App\EstadoInmueble;
use App\TipoHabitacion;
use Illuminate\Http\Request;

use App\InformacionPagina;

use App\Http\Controllers\ParametrizacionVisual;

class TipoHabitacionController extends Controller
{
    public static function Consultar() {
        try {
            return TipoHabitacion::where('estado','=','1')->get()->toArray();
        } catch (Exception $e) {
            return 'Grave error: ' . $e;
        }
    }
}
