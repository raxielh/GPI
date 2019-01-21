<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    protected $table = 'personas';

    public $fillable = [
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'tipoidentificacion_id',
        'identificacion',
        'fijo',
        'celular',
        'direccion',
        'generos_id',
    ];

    protected $guarded = ['id'];

}
