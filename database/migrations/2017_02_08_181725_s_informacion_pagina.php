<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SInformacionPagina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_informacion_pagina', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nosotros',3000);
            $table->string('mision',3000);
            $table->string('vision',3000);
            $table->string('valores',3000);
            $table->string('que_hacemos',3000);
            $table->string('telefono',100);
            $table->string('correo_contacto',100);
            $table->string('ciudad',150);
            $table->string('direccion',80);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_informacion_pagina');
    }
}
