<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compromisos_maestros extends Model
{
    protected $table = 'compromisos_maestros';

    public $fillable = [
        'direciones_areas_id',
'respon_id',
'respon_revi_id',
'cargo_respon_revi_id',
'fecha_inicio',
'fecha_final',

    ];

    protected $guarded = ['id'];
}
