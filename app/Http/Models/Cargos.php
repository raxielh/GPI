<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class Cargos extends Model
{
    protected $table = 'cargos';

    public $fillable = [
        'descripcion_larga',
'descripcion_corta',

    ];

    protected $guarded = ['id'];
}
