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
        Schema::create('tratamientos_mascota', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_Tratamiento');
            $table->string('duracion');
            $table->date('FechaInicio');
            $table->date('FechaFin');
            $table->date('SiguienteVisita')->nullable();
            $table->integer('visitas_realizadas');
            $table->integer('dosis_totales');
            $table->integer('frecuencia')->nullable();
            $table->foreign('ID_Tratamiento')->references('id')->on('tratamiento');
            $table->integer('ID_Historial')->foreign('ID_Historial')->references('id')->on('historial');
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
        Schema::dropIfExists('tratamientos_mascota');
    }
};
