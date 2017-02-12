<?php

use Illuminate\Database\Seeder;

class TipoHabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('s_tipo_habitacion')->insert([
            'id' => 1,
            'nombre' => 'Habitaciones Sencilla',
            'estado' => 1,
        ]);
        DB::table('s_tipo_habitacion')->insert([
            'id' => 2,
            'nombre' => 'Habitaciones Sencilla Semi-Doble',
            'estado' => 1,
        ]);
        DB::table('s_tipo_habitacion')->insert([
            'id' => 3,
            'nombre' => 'Habitaciones Familiares',
            'estado' => 1,
        ]);
        DB::table('s_tipo_habitacion')->insert([
            'id' => 4,
            'nombre' => 'Habitación Doble',
            'estado' => 1,
        ]);
    }
}
