<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
//use App\Mail\EnvioContacto;

// Envio de correo
Route::get('enviarCorreo', function () {
    Mail::to('jjrb6@hotmail.com')->send(new EnvioContacto());
    return redirect('/contacto?envio=true');
});

// Link principal
Route::get('/',function(){
    return redirect('inicio');
});

Route::get('/{pagina}','NavegacionController@Usuario');
Route::get('/administrador/{carpeta}/{pagina}','NavegacionController@Administrador');
Route::post('/ingresar/verificar','SesionController@VerificarUsuario');
Route::get('/administrador/cerrarSession','SesionController@CerrarSesion');

// Administracion
Route::get('/administrador/inicio',function(Request $request){
    return !$request->session()->get('nombres') ? redirect('/inicio') : View::make('administrador.inicio',['nombres' => $request->session()->get('nombres')]);
});


// Sesion de usuario
Route::post('/administrador/usuario/inicio/buscar','UsuarioController@ConsultarUsuario');
Route::post('/administrador/usuario/inicio/buscar/id','UsuarioController@ConsultarUsuarioId');
Route::post('/administrador/usuario/inicio/registrar','UsuarioController@GuardarUsuario');
Route::post('/administrador/usuario/inicio/actualizar','UsuarioController@ActualizarUsuario');
Route::post('/administrador/usuario/inicio/deshabilitar','UsuarioController@DeshabilitarUsuario');

// Sesion de información
Route::post('/administrador/informacion/inicio/actualizar','InformacionPaginaController@ActualizarInformacionPagina');

// Sesion de habitacion
Route::post('/administrador/habitacion/inicio/buscar','HabitacionController@Consultar');
Route::post('/administrador/habitacion/inicio/buscar/id','HabitacionController@ConsultarId');
Route::post('/administrador/habitacion/inicio/registrar','HabitacionController@Guardar');
Route::post('/administrador/habitacion/inicio/actualizar','HabitacionController@Actualizar');
Route::post('/administrador/habitacion/inicio/deshabilitar','HabitacionController@Deshabilitar');
Route::get('/administrador/habitacion/inicio/buscador','HabitacionController@Buscador');

// Imagenes
Route::post('/administrador/habitacion/imagenes/buscar','ImagenController@Consultar');
Route::post('/administrador/habitacion/imagenes/guardar','ImagenController@Guardar');
Route::post('/administrador/habitacion/imagenes/eliminar','ImagenController@Eliminar');

// Servicios
Route::post('/administrador/habitacion/servicios/buscar','HabitacionServicioController@Consultar');
Route::post('/administrador/habitacion/servicios/guardar','HabitacionServicioController@Guardar');
Route::post('/administrador/habitacion/servicios/eliminar','HabitacionServicioController@Eliminar');