<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class Empleados extends Model
{
    protected $table = 'empleados';

    public $fillable = [
        'persona_id',
'cargos_id',
'empleado_estados_id',
'empleados_tipos_id',

    ];

    protected $guarded = ['id'];
}
