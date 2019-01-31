<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class Proyectos extends Model
{
    protected $table = 'proyecto';

    public $fillable = [
        'descripcion_larga',
'descripcion_corta',
'sede_id',
'estado_proyecto_id',

    ];

    protected $guarded = ['id'];
}
