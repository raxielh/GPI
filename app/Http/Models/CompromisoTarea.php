<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class CompromisoTarea extends Model
{
    protected $table = 'compromiso_tarea';

    public $fillable = [
        'compromisos_id',
'tarea_estado_id',
'tipo_tarea_id',
'users_id',
'fecha_propuesta_entrega',
'fecha_entrega',
'porcentage',
'descripcion_taera',

    ];

    protected $guarded = ['id'];
}
