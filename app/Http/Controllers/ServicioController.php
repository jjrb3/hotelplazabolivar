<?php

namespace App\Http\Controllers;

use App\Servicio;

class ServicioController extends Controller
{
    public static function Consultar() {
        try {
            return Servicio::where('estado','=','1')->get()->toArray();
        } catch (Exception $e) {
            return 'Grave error: ' . $e;
        }
    }
}
