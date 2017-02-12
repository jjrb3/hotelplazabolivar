<?php

use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('s_servicio')->insert([
            'id' => 1,
            'nombre' => 'WIFI',
            'icono' => 'fa fa-wifi',
            'estado' => 1,
        ]);
        DB::table('s_servicio')->insert([
            'id' => 2,
            'nombre' => 'Televisión',
            'icono' => 'fa fa-tv',
            'estado' => 1,
        ]);
        DB::table('s_servicio')->insert([
            'id' => 3,
            'nombre' => 'Parqueadero',
            'icono' => 'fa fa-car',
            'estado' => 1,
        ]);
        DB::table('s_servicio')->insert([
            'id' => 4,
            'nombre' => 'Aire Acondicionado',
            'icono' => 'fa fa-snowflake-o',
            'estado' => 1,
        ]);
    }
}
