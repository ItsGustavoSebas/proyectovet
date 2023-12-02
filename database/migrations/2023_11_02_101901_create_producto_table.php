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
            $table->decimal('precioVenta');
            $table->string('descripcion');
            $table->integer('cantidadGeneral');
            $table->unsignedBigInteger('ID_Categoria')->nullable();
            $table->unsignedBigInteger('ID_Marca')->nullable(); 
            $table->foreign('ID_Categoria')->references('id')->on('categoria')->onDelete('set null');
            $table->foreign('ID_Marca')->references('id')->on('marcas')->onDelete('set null');
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
