<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class direciones_areas extends Model
{
    protected $table = 'direciones_areas';

    public $fillable = [
        'descripcion_larga',
'descripcion_corta',

    ];

    protected $guarded = ['id'];
}
