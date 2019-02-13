<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class TareaEstado extends Model
{
    protected $table = 'tarea_estado';

    public $fillable = [
        'descripcion_larga',
'descripcion_corta',

    ];

    protected $guarded = ['id'];
}
