<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory;

    use SoftDeletes;

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

    public function cuota(){
        return $this->hasMany(Cuota::class);
    }
}
