<?php

namespace App\Http\Controllers;

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
                //'estadoInmueble' => EstadoInmuebleController::Consultar()
            ]);
    }

    public function Usuario(Request $request,$pagina) {

        //$inmueble = new InmuebleController();

        return View($pagina,
            [
                /*'informacionPagina' => InformacionPaginaController::ConsultarInformacionPagina(),
                'estadoInmueble' => EstadoInmuebleController::Consultar(),
                'inmuebles' => $inmueble->Buscador($request),*/
            ]);
    }
}
