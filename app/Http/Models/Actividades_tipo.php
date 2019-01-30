<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class Actividades_tipo extends Model
{
    protected $table = 'actividades_tipo';

    public $fillable = [
        'descripcion_larga',
'descripcion_corta',

    ];

    protected $guarded = ['id'];
}
