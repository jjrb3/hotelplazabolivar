<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('s_usuario')->insert([
            'id' => 1,
            'usuario' => 'jeremy.reyes',
            'clave' => md5('jeremy.reyes'),
            'nombres' => 'Jeremy José',
            'apellidos' => 'Reyes Barrios',
            'correo' => 'jeremy.reyes@stids.net',
            'estado' => 1,
        ]);
        DB::table('s_usuario')->insert([
            'id' => 2,
            'usuario' => 'alvaro.perez',
            'clave' => md5('alvaro.perez'),
            'nombres' => 'Alvaro Enrrique',
            'apellidos' => 'Perez Malo',
            'correo' => 'alvaro.perez@stids.net',
            'estado' => 1,
        ]);
        DB::table('s_usuario')->insert([
            'id' => 3,
            'usuario' => 'deivis.rada',
            'clave' => md5('deivis.rada'),
            'nombres' => 'Deivis Jhon',
            'apellidos' => 'Rada Rodriguez',
            'correo' => 'deivis.rada@stids.net',
            'estado' => 1,
        ]);
    }
}
