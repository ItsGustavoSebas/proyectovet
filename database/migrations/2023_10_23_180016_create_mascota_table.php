<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascota', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->char('sexo');
            $table->string('color');
            $table->date('fechaNacimiento');
            $table->integer('edad');
            $table->boolean('esterilizado');
            $table->integer('ID_Cliente')->foreign('ID_Cliente')->references('id')->on('users');
            $table->integer('ID_Especie')->foreign('ID_Especie')->references('id')->on('especie');
            $table->integer('ID_Raza')->foreign('ID_Raza')->references('id')->on('raza');
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
        Schema::dropIfExists('mascota');
    }
};
