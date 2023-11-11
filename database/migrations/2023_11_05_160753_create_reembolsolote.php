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
        Schema::create('reembolsolote', function (Blueprint $table) {
            $table->id();
            $table->string('numeroLote');
            $table->date('fechaCompra');
            $table->string('fechaVencimiento')->nullable();
            $table->string('motivo');
            $table->integer('ID_Proveedor')->foreign('ID_Proveedor')->references('id')->on('proveedor');
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
        Schema::dropIfExists('reembolsolote');
    }
};
