<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SHabitacionServicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_habitacion_servicio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_habitacion')->unsigned();
            $table->integer('id_servicio')->unsigned();
            $table->foreign('id_habitacion')->references('id')->on('s_habitacion');
            $table->foreign('id_servicio')->references('id')->on('s_servicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_habitacion_servicio');
    }
}
