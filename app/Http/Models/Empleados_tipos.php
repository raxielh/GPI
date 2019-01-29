<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class Empleados_tipos extends Model
{
    protected $table = 'empleados_tipos';

    public $fillable = [
        'descripcion_larga',
'descripcion_corta',

    ];

    protected $guarded = ['id'];
}
