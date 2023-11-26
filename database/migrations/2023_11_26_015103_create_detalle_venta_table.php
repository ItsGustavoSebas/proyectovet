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
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_Producto');
            $table->unsignedBigInteger('ID_Nota_Venta');    
            $table->integer('cantidad');
            $table->decimal('precio');
            $table->foreign('ID_Producto')->references('id')->on('producto');
            $table->foreign('ID_Nota_Venta')->references('id')->on('nota_venta');
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
        Schema::dropIfExists('detalle_venta');
    }
};
