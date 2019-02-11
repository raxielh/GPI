<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compromisos extends Model
{
    protected $table = 'compromisos';

    public $fillable = [
        'compromisos_maestros_id',
'compromisos_laborales',
'nro_seguimientos',
'proyecto_id',
'responsable_id',
'fecha_inicio_compromiso',
'fecha_fin_compromiso',
'fecha_real_entrega',
'dias_avance_retraso',
'estado_compromiso_id',
'causas_id',
'descripcion_causa',
'porcentage',

    ];

    protected $guarded = ['id'];
}
