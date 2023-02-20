<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class Empleado extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use SoftDeletes;

    protected $fillable = [
        'dni',
        'github_id',
        'google_id',
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
