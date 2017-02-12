<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SHabitacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_habitacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tipo_habitacion')->unsigned();
            $table->string('nombre',100);
            $table->integer('valor');
            $table->integer('valor_oferta');
            $table->integer('cantidad_habitacion');
            $table->string('descripcion',8000);
            $table->string('direccion',100);
            $table->integer('cantidad_adultos');
            $table->integer('cantidad_menores');
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->string('latitud',100)->nullable();
            $table->string('altitud',100)->nullable();
            $table->boolean('estado');
            $table->foreign('id_tipo_habitacion')->references('id')->on('s_tipo_habitacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_habitacion');
    }
}
