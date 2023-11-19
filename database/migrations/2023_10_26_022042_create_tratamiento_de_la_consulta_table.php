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
        Schema::create('tratamiento_de_la_consulta', function (Blueprint $table) {
            $table->id();
            $table->integer('precio');
            $table->date('fecha');
            $table->unsignedBigInteger('ID_TratamientoMascota');
            $table->unsignedBigInteger('ID_Consulta');
            $table->foreign('ID_TratamientoMascota')->references('id')->on('tratamientos_mascota');
            $table->foreign('ID_Consulta')->references('id')->on('consulta');
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
        Schema::dropIfExists('tratamiento_de_la_consulta');
    }
};
