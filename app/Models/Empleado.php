<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Empleado extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'dni',
        'nombre',
        'apellidos',
        'telefono',
        'email',
        'password',
        'fecha_alta',
        'direccion',
        'tipo',
    ];

    public function tarea(){
        return $this->hasMany(Tarea::class);
    }
}
