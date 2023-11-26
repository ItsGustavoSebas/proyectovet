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
            $table->foreign('ID_Cliente')->references('id')->on('cliente')->onDelete('cascade');
            $table->foreign('ID_Empleado')->references('id')->on('empleado')->onDelete('cascade');
            $table->boolean('qr');
            $table->foreign('ID_Cita')->references('id')->on('citas')->nulleable();
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
