<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id',
        'rut',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'fecha_nacimiento',
        'correo',
        'telefono',
        'carrera_id',
    ];

    public const PAGINATE = 10;

    public function carrera(){
        return $this->belongsTo(carrera::class);
    }
}
