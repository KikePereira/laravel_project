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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('dni');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('telefono');
            $table->string('correo');
            $table->string('direccion');
            $table->string('cuenta_corriente');
            $table->string('pais');
            $table->string('moneda');
            $table->string('importe_mensual');
            $table->softDeletes();
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
        Schema::dropIfExists('clientes');
    }
};
