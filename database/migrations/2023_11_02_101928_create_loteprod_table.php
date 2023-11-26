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
        Schema::create('loteprod', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_Producto');
            $table->unsignedBigInteger('ID_Lote');
            $table->integer('cantidadComprada');
            $table->integer('cantidadActual');
            $table->decimal('precioCompra');
            $table->foreign('ID_Producto')->references('id')->on('producto');
            $table->foreign('ID_Lote')->references('id')->on('lote');
            $table->integer('ID_Medida')->foreign('ID_Medida')->references('id')->on('medida');
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
        Schema::dropIfExists('loteprod');
    }
};
