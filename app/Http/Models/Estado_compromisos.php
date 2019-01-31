<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class Estado_compromisos extends Model
{
    protected $table = 'estado_compromiso';

    public $fillable = [
        'descripcion_larga',
'descripcion_corta',

    ];

    protected $guarded = ['id'];
}
