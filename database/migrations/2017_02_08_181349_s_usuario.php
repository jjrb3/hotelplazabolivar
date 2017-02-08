<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario',50)->unique();
            $table->string('clave',100);
            $table->string('nombres',60);
            $table->string('apellidos',60)->nullable();
            $table->string('correo',60)->unique();
            $table->boolean('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_usuario');
    }
}
