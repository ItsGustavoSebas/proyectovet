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
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('precioVenta');
            $table->string('descripcion');
            $table->integer('cantidad');
            $table->date('fechaVencimiento');
            $table->integer('ID_Categoria')->foreign('ID_Categoria')->references('id')->on('categoria');
            $table->integer('ID_Marcas')->foreign('ID_Marcas')->references('id')->on('marcas');
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
        Schema::dropIfExists('producto');
    }
};
