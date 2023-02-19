<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuota extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'concepto',
        'fecha_emision',
        'importe',
        'estado',
        'fecha_pago',
        'direccion',
        'notas',
        'cliente_id',
    ];


    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
