<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class Empleado_estados extends Model
{
    protected $table = 'empleado_estados';

    public $fillable = [
        'descripcion_larga',
'descripcion_corta',

    ];

    protected $guarded = ['id'];
}
