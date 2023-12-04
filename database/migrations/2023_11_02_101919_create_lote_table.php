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
        Schema::create('lote', function (Blueprint $table) {
            $table->id();
            $table->string('numeroLote');
            $table->date('fechaCompra');
            $table->string('fechaVencimiento')->nullable();
            $table->boolean('estado');
            $table->integer('ID_Proveedor')->foreign('ID_Proveedor')->references('id')->on('proveedor');
            $table->integer('ID_NotaCompra')->foreign('ID_NotaCompra')->references('id')->on('nota_compra')->onDelete('set null')->nullable();
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
        Schema::dropIfExists('lote');
    }
};
