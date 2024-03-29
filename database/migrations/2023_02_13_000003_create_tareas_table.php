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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->longText('descripcion');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('telefono');
            $table->string('correo');
            $table->string('direccion');
            $table->string('zip');
            $table->string('poblacion');
            $table->string('provincia');
            $table->string('estado');
            $table->string('fecha_realizacion');
            $table->string('fecha_finalizacion');
            $table->longtext('anotacion_inicio');
            $table->longtext('anotacion_final');
            $table->foreignId('empleado_id')->constrained()->nullable();
            $table->foreignId('cliente_id')->constrained()->nullable(); 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tareas');
    }
};
