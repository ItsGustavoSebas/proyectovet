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
        Schema::create('receta_medica', function (Blueprint $table) {
            $table->id();
            $table->date('FechaEmision');
            $table->unsignedBigInteger('ID_Consulta');
            $table->unsignedBigInteger('ID_Empleado')->nullable();
            $table->foreign('ID_Consulta')->references('id')->on('consulta')->onDelete('cascade');
            $table->foreign('ID_Empleado')->references('id')->on('users');
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
        Schema::dropIfExists('receta_medica');
    }
};
