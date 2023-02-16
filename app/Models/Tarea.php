<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $fillable = [
            'descripcion',
            'nombre',
            'apellidos',
            'telefono',
            'correo',
            'direccion',
            'zip',
            'poblacion',
            'provincia',
            'estado',
            'fecha_realizacion',
            'fecha_finalizacion',
            'anotacion_inicio',
            'anotacion_final',
            'empleado_id',
            'cliente_id',
        ];

    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
