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
        Schema::create('nota_venta', function (Blueprint $table) {
            $table->id();
            $table->integer('montoTotal');
            $table->date('fecha');
  
          

            $table->boolean('factura')->default(true);
        //    $table->boolean('recibo')->default(false);
         //   $table->integer('nroRecibo')->nullable();
            $table->integer('nroFactura')->nullable();
            $table->integer('nit')->nullable();
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
        Schema::dropIfExists('nota_venta');
    }
};
