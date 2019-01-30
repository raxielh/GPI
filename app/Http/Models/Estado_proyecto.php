<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class Estado_proyecto extends Model
{
    protected $table = 'estado_proyecto';

    public $fillable = [
        'descripcion_larga',
'descripcion_corta',

    ];

    protected $guarded = ['id'];
}
