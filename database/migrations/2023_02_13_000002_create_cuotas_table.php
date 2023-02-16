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
        Schema::create('cuotas', function (Blueprint $table) {
            $table->id();
            $table->string('concepto');
            $table->string('fecha_emision');
            $table->string('importe');
            $table->string('estado');
            $table->string('fecha_pago');
            $table->string('direccion');
            $table->longText('notas');
            $table->foreignId('cliente_id')->constrained(); 
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
        Schema::dropIfExists('cuotas');
    }
};
