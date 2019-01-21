<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sedes extends Model
{
    protected $table = 'sedes';

    public $fillable = [
        'descripcion',
        'direccion',
        'telefono',
        'companias_id',
    ];

    protected $guarded = ['id'];
}
