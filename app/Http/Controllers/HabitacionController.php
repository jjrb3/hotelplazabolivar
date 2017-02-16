<?php

namespace App\Http\Controllers;

use App\Habitacion;
use App\Imagen;
use App\HabitacionServicio;
use App\TipoHabitacion;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class HabitacionController extends Controller
{
    public function Deshabilitar(Request $request)
    {
        $habitacion = Habitacion::Find($request->get('id'));
        $habitacion->estado = (int)0;

        try {
            if ($habitacion->save()) {

                return response()->json(array(
                    'resultado' => 1,
                    'mensaje' => 'Se eliminó la propiedad correctamente',
                ));
            } else {
                return response()->json(array(
                    'resultado' => 0,
                    'mensaje' => 'Se encontraron problemas al eliminar la propiedad',
                ));
            }
        } catch (Exception $e) {
            return response()->json(array(
                'resultado' => -1,
                'mensaje' => 'Grave error: ' . $e,
            ));
        }

    }

    public function Actualizar(Request $request)
    {
        if ($this->verificacionCampos($request)) {
            return $this->verificacionCampos($request);
        }

        $habitacion = Habitacion::Find($request->get('id'));
        $habitacion->id_tipo_habitacion = $request->get('tipoHabitacion');
        $habitacion->nombre = trim($request->get('nombre'));
        $habitacion->valor = $request->get('valor');
        $habitacion->valor_oferta = $request->get('valorOferta');
        $habitacion->cantidad_habitacion = $request->get('cantidadHabitacion');
        $habitacion->direccion = $request->get('direccion');
        $habitacion->cantidad_adultos = $request->get('cantidadAdultos');
        $habitacion->cantidad_menores = $request->get('cantidadMenores');
        $habitacion->hora_entrada = $request->get('horaEntrada');
        $habitacion->hora_salida = $request->get('horaSalida');
        $habitacion->latitud = $request->get('gpsLatitud');
        $habitacion->altitud = $request->get('gpsAltitud');
        $habitacion->descripcion = $request->get('descripcion');
        $habitacion->estado = 1;

        try {
            if ($habitacion->save()) {
                return response()->json(array(
                    'resultado' => 1,
                    'mensaje' => 'Se actualizó la habitación correctamente',
                ));
            } else {
                return response()->json(array(
                    'resultado' => 0,
                    'mensaje' => 'Se encontraron problemas al actualiar la habitación',
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
        if ($this->verificacionCampos($request)) {
            return $this->verificacionCampos($request);
        }

        $habitacion = new Habitacion();
        $habitacion->id_tipo_habitacion = $request->get('tipoHabitacion');
        $habitacion->nombre = trim($request->get('nombre'));
        $habitacion->valor = $request->get('valor');
        $habitacion->valor_oferta = $request->get('valorOferta');
        $habitacion->cantidad_habitacion = $request->get('cantidadHabitacion');
        $habitacion->direccion = $request->get('direccion');
        $habitacion->cantidad_adultos = $request->get('cantidadAdultos');
        $habitacion->cantidad_menores = $request->get('cantidadMenores');
        $habitacion->hora_entrada = $request->get('horaEntrada');
        $habitacion->hora_salida = $request->get('horaSalida');
        $habitacion->latitud = $request->get('gpsLatitud');
        $habitacion->altitud = $request->get('gpsAltitud');
        $habitacion->descripcion = $request->get('descripcion');
        $habitacion->estado = 1;

        try {
            if ($habitacion->save()) {
                return response()->json(array(
                    'resultado' => 1,
                    'mensaje' => 'Se creó la habitacion correctamente',
                ));
            } else {
                return response()->json(array(
                    'resultado' => 0,
                    'mensaje' => 'Se encontraron problemas al crear la habitacion',
                ));
            }
        } catch (Exception $e) {
            return response()->json(array(
                'resultado' => -1,
                'mensaje' => 'Grave error: ' . $e,
            ));
        }
    }

    function verificacionCampos($request){

        if (!$request->get('tipoHabitacion')) {
            return response()->json(array(
                'resultado' => 0,
                'mensaje' => 'Debe seleccionar el tipo de habitacion para continuar',
            ));
        }

        if (!$request->get('nombre')) {
            return response()->json(array(
                'resultado' => 0,
                'mensaje' => 'Debe ingresar el campo nombre para continuar',
            ));
        }

        if (!$request->get('valor')) {
            return response()->json(array(
                'resultado' => 0,
                'mensaje' => 'Debe ingresar el campo valor para continuar',
            ));
        }

        if (!$request->get('valorOferta')) {
            return response()->json(array(
                'resultado' => 0,
                'mensaje' => 'Debe ingresar el campo valor oferta para continuar',
            ));
        }

        if (!$request->get('cantidadHabitacion')) {
            return response()->json(array(
                'resultado' => 0,
                'mensaje' => 'Debe ingresar el campo cantidad de habitaciones para continuar',
            ));
        }

        if (!$request->get('direccion')) {
            return response()->json(array(
                'resultado' => 0,
                'mensaje' => 'Debe ingresar el campo direccion para continuar',
            ));
        }

        if (!$request->get('cantidadAdultos')) {
            return response()->json(array(
                'resultado' => 0,
                'mensaje' => 'Debe ingresar el campo cantidad de adultos para continuar',
            ));
        }

        if (!$request->get('cantidadMenores')) {
            return response()->json(array(
                'resultado' => 0,
                'mensaje' => 'Debe ingresar el campo cantidad de menores para continuar',
            ));
        }

        if (!$request->get('horaEntrada')) {
            return response()->json(array(
                'resultado' => 0,
                'mensaje' => 'Debe ingresar el campo hora de entrada para continuar',
            ));
        }

        if (!$request->get('horaSalida')) {
            return response()->json(array(
                'resultado' => 0,
                'mensaje' => 'Debe ingresar el campo hora de salida para continuar',
            ));
        }

        if (!$request->get('descripcion')) {
            return response()->json(array(
                'resultado' => 0,
                'mensaje' => 'Debe ingresar el campo descripcion para continuar',
            ));
        }
    }

    public function ConsultarId(Request $request)
    {
        try {
            $sql = Habitacion::where('id','=',$request->get('id'))->get();

            if ($sql) {
                return response()->json(array(
                    'resultado' => 1,
                    'mensaje' => 'Se econtraron datos',
                    'json' => $sql
                ));
            } else {
                return response()->json(array(
                    'resultado' => 0,
                    'mensaje' => 'No se encontraron resultados para la consulta',
                ));
            }
        } catch (Exception $e) {
            return response()->json(array(
                'resultado' => -1,
                'mensaje' => 'Grave error: ' . $e,
            ));
        }
    }

    public function Consultar(Request $request)
    {
        $currentPage = $request->get('pagina');

        // Fuerza a estar en la pagina
        Paginator::currentPageResolver(function() use ($currentPage) {
            return $currentPage;
        });

        try {

            if ($request->get('buscar')) {
                $sql = Habitacion::select('s_habitacion.*','s_tipo_habitacion.nombre as tipo_habitacion')
                    ->join('s_tipo_habitacion','s_habitacion.id_tipo_habitacion','=','s_tipo_habitacion.id')
                    ->whereRaw("(s_habitacion.nombre like '%".$request->get('buscar')."%'
                                 OR s_habitacion.valor like '%".$request->get('buscar')."%'
                                 OR s_tipo_habitacion.nombre like '%".$request->get('buscar')."%')")
                    ->orderBy('s_habitacion.estado', 'DESC')
                    ->orderBy('s_habitacion.nombre', 'ASC')
                    ->paginate($request->get('tamanhioPagina'));
            }
            elseif ($request->get('tipoHabitacion')) {

                $arreglo = array();

                $tipoHabitacion = TipoHabitacion::where('id','=',$request->get('tipoHabitacion'))->get()->toArray();

                if ($tipoHabitacion) {
                    $arreglo['tipoHabitacion'] = $tipoHabitacion[0]['nombre'];
                }

                $sql = Habitacion::select('s_habitacion.*','s_tipo_habitacion.nombre as tipo_habitacion')
                    ->join('s_tipo_habitacion','s_habitacion.id_tipo_habitacion','=','s_tipo_habitacion.id')
                    ->orderBy('s_habitacion.nombre', 'ASC')
                    ->where('s_tipo_habitacion.id','=',$request->get('tipoHabitacion'))->get()->toArray();

                if ($sql) {
                    foreach ($sql as $habitacion) {

                        $imagen = Imagen::where('id_habitacion','=',$habitacion['id'])->get()->toArray();
                        $servicio = HabitacionServicio::select('s_habitacion_servicio.*','s_servicio.nombre as servicio','s_servicio.icono as icono_servicio')
                            ->join('s_servicio','s_habitacion_servicio.id_servicio','=','s_servicio.id')
                            ->where('s_habitacion_servicio.id_habitacion', '=', $habitacion['id'])
                            ->where('s_servicio.estado', '=', '1')
                            ->orderBy('s_servicio.nombre', 'ASC')->get()->toArray();


                        $arreglo['habitacion'][$habitacion['id']] = $habitacion;
                        $arreglo['imagenes'][$habitacion['id']] = $imagen;
                        $arreglo['servicio'][$habitacion['id']] = $servicio;
                    }
                }

                return array($arreglo);
            }
            else {

                $sql = Habitacion::select('s_habitacion.*','s_tipo_habitacion.nombre as tipo_habitacion')
                    ->join('s_tipo_habitacion','s_habitacion.id_tipo_habitacion','=','s_tipo_habitacion.id')
                    ->orderBy('s_habitacion.estado', 'DESC')
                    ->orderBy('s_habitacion.nombre', 'ASC')
                    ->paginate($request->get('tamanhioPagina'));
            }


            if (count($sql)) {
                return response()->json(array(
                    'resultado' => 1,
                    'mensaje'   => 'Se econtraron datos',
                    'json'      => $sql
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

    public function Buscador(Request $request)
    {
        $where = '';
        $orderBy1 = '';
        $orderBy2 = '';
        $condicion = ' ';

        if ($request->get('id')) {

            $where .= "$condicion inmueble.id =" . $request->get('id');
            $condicion = ' AND ';
        }

        if ($request->get('descripcion')) {

            $where .= "$condicion inmueble.nombre LIKE '%" . $request->get('descripcion') . "%'";
            $condicion = ' AND ';
        }

        if ($request->get('estado')) {

            $where .= "$condicion inmueble.id_estado_inmueble = " . $request->get('estado');
            $condicion = ' AND ';
        }

        if ($request->get('valor')) {

            $arregloValor = explode(';',$request->get('valor'));

            $where .= " $condicion inmueble.valor >= " . $arregloValor[0];

            if ($arregloValor[1] != 'adelante') {

                $where .= " $condicion inmueble.valor <= " . $arregloValor[1];
            }
        }

        $currentPage = $request->get('pagina');

        // Fuerza a estar en la pagina
        Paginator::currentPageResolver(function() use ($currentPage) {
            return $currentPage;
        });

        try {

            $orderBy1  = !$where ? 'inmueble.nombre' : 'inmueble.id';
            $orderBy2  = !$where ? 'ASC' : 'DESC';
            $where    .= !$where ? ' inmueble.estado = 1 ' : ' AND inmueble.estado = 1 ';

            $inmueble = Inmueble::select('inmueble.*','estado_inmueble.nombre as estado_inmueble')
                ->join('estado_inmueble','inmueble.id_estado_inmueble','=','estado_inmueble.id')
                ->whereRaw($where)
                ->orderBy($orderBy1, $orderBy2)
                ->paginate($request->get('tamanhioPagina'));


            if (count($inmueble)) {

                // Busqueda de imagenes
                $arreglo = array();

                foreach ($inmueble as $listado) {

                    try {
                        $imagen = Imagen::where('id_inmueble', '=', $listado->id)->orderBy('id_inmueble', 'ASC')->get();

                        foreach ($imagen as $listadoImagen) {
                            $arreglo[$listado->id][] = $listadoImagen->ruta;

                        }
                    }
                    catch (Exception $e) {
                        null;
                    }
                }
                // Fin de busqueda de imagen

                return array(
                    'resultado' => 1,
                    'mensaje'   => 'Se econtraron datos',
                    'datos'      => $inmueble->toArray(),
                    'imagenes'  => $arreglo
                );
            }
            else {
                return array(
                    'resultado' => 0,
                    'mensaje'   => 'No se encontraron resultados para la consulta',
                );
            }
        }
        catch (Exception $e) {
            return array(
                'resultado' => -2,
                'mensaje'   => 'Grave error: ' . $e,
            );
        }
    }
}
