<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SReserva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_reserva', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_titulo')->unsigned();
            $table->integer('id_habitacion')->unsigned();
            $table->string('nombres',100);
            $table->string('apellidos',100);
            $table->string('email',100);
            $table->string('telefono',50);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->foreign('id_titulo')->references('id')->on('s_titulo');
            $table->foreign('id_habitacion')->references('id')->on('s_habitacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_reserva');
    }
}
