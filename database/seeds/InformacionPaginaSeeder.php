<?php

use Illuminate\Database\Seeder;

class InformacionPaginaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('s_informacion_pagina')->insert([
            'id' => 1,
            'nosotros' => '',
            'mision' => '',
            'vision' => '',
            'valores' => '',
            'que_hacemos' => '',
            'telefono' => '',
            'correo_contacto' => '',
            'ciudad' => '',
            'direccion' => '',
        ]);
    }
}
