<?php

use Illuminate\Database\Seeder;

class TituloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('s_titulo')->insert([
            'id' => 1,
            'descripcion' => 'Sr',
        ]);
        DB::table('s_titulo')->insert([
            'id' => 2,
            'descripcion' => 'Sra',
        ]);
        DB::table('s_titulo')->insert([
            'id' => 3,
            'descripcion' => 'Srta',
        ]);
    }
}
