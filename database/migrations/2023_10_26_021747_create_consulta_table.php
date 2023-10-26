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
        Schema::create('consulta', function (Blueprint $table) {
            $table->id();
            $table->date('Fecha');
            $table->string('Motivo');
            $table->integer('MontoTotal');
            $table->string('Observacion');
            $table->integer('ID_Cita')->foreign('ID_Cita')->references('id')->on('citas');
            $table->integer('ID_Empleado')->foreign('ID_Empleado')->references('id')->on('users');
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
        Schema::dropIfExists('consulta');
    }
};
