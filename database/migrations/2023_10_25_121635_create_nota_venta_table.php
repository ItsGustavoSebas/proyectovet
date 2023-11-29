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
            $table->decimal('montoTotal');
            $table->date('fecha');
  
          

            $table->boolean('factura')->default(true);
            $table->boolean('recibo')->default(false);
            $table->integer('ID_Cliente')->foreign('ID_Cliente')->references('id')->on('clientes')->onDelete('cascade');
            $table->integer('ID_Empleado')->foreign('ID_Empleado')->references('id')->on('empleados')->onDelete('cascade');
            $table->boolean('qr');
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
