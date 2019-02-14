<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    protected $table = 'tareas';

    public $fillable = [
        'descripcion_taera',
'fecha_entrega',
'fecha_propuesta_entrega',
'porcentage',
'proyecto_id',
'tarea_estado_id',
'tipo_tarea_id',
'users_id',
'users_id_quien',

    ];

    protected $guarded = ['id'];
}
