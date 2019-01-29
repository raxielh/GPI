<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class Causas extends Model
{
    protected $table = 'causas';

    public $fillable = [
        'descripcion_larga',
'descripcion_corta',

    ];

    protected $guarded = ['id'];
}
