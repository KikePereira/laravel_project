<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni',
        'nombre',
        'apellidos',
        'telefono',
        'correo',
        'direccion',
        'pais',
        'moneda',
        'cuenta_corriente',
        'importe_mensual',
    ];

    public function tarea(){
        return $this->hasMany(Tarea::class);
    }
}
