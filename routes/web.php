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

// Link principal
Route::get('/',function(){
    return redirect('inicio');
});

Route::get('/{pagina}','NavegacionController@Usuario');

Route::get('tema/usuario',function(){
    return view('tema.usuario');
});