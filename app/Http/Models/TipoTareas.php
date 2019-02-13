<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class TipoTareas extends Model
{
    protected $table = 'tipo_tarea';

    public $fillable = [
        'descripcion_larga',
'descripcion_corta',

    ];

    protected $guarded = ['id'];
}
