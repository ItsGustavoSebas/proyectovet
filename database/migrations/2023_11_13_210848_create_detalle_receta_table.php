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
        Schema::create('detalle_receta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_RecetaMedica');
            $table->unsignedBigInteger('ID_Producto');
            $table->integer('Cantidad');
            $table->string('instrucciones');
            $table->foreign('ID_Producto')->references('id')->on('producto');
            $table->foreign('ID_RecetaMedica')->references('id')->on('receta_medica');
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
        Schema::dropIfExists('detalle_receta');
    }
};
