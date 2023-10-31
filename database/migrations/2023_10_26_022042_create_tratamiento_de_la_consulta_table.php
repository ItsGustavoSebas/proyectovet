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
            $table->unsignedBigInteger('ID_Tratamiento');
            $table->unsignedBigInteger('ID_Consulta');
            $table->string('duracion');
            $table->date('FechaInicio');
            $table->date('FechaFin');
            $table->date('SiguienteVisita');
            $table->foreign('ID_Tratamiento')->references('id')->on('tratamiento');
            $table->foreign('ID_Consulta')->references('id')->on('consulta');
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
        Schema::dropIfExists('tratamiento_de_la_consulta');
    }
};
