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
            'icono' => 'fa fa-bolt',
            'estado' => 1,
        ]);
        DB::table('s_servicio')->insert([
            'id' => 5,
            'nombre' => '1 Cama',
            'icono' => 'fa fa-bed',
            'estado' => 1,
        ]);
        DB::table('s_servicio')->insert([
            'id' => 6,
            'nombre' => '2 Cama',
            'icono' => 'fa fa-bed',
            'estado' => 1,
        ]);
        DB::table('s_servicio')->insert([
            'id' => 7,
            'nombre' => '1 Baño',
            'icono' => 'fa fa-trash-o',
            'estado' => 1,
        ]);
        DB::table('s_servicio')->insert([
            'id' => 8,
            'nombre' => 'Nevera',
            'icono' => 'fa fa-inbox',
            'estado' => 1,
        ]);
    }
}
