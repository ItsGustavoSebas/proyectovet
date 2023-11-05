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
        Schema::create('detalleservicio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_Cita');
            $table->unsignedBigInteger('ID_Servicio');
            $table->string('Tiempo');         
            $table->foreign('ID_Cita')->references('id')->on('citas');
            $table->foreign('ID_Servicio')->references('id')->on('servicios');
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
        Schema::dropIfExists('detalleservicio');
    }
};
