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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->text('descripcion');
            $table->date('fechaProgramada');
            $table->integer('hora');
            $table->text('tipo');
            $table->timestamps();
            $table->integer('ID_Cliente')->foreign('ID_Cliente')->references('id')->on('users');
            $table->boolean('activo');
            $table->decimal('montoTotal')->nullable();
            $table->unsignedBigInteger('ID_Nota_Venta')->nullable();
            $table->foreign('ID_Nota_Venta')->references('id')->on('nota_venta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cita');
    }
};
