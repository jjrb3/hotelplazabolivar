<?php

namespace App\Http\Controllers;

use App\Titulo;

class TituloController extends Controller
{
    public static function Consultar() {
        try {
            return Titulo::get();
        } catch (Exception $e) {
            return 'Grave error: ' . $e;
        }
    }
}
