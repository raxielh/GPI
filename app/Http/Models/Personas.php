<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    protected $table = 'personas';

    public $fillable = [
        'nombres',
        'apellidos',
        'tipoidentificacion_id',
        'identificacion',
        'fijo',
        'celular',
        'direccion',
    ];

}
