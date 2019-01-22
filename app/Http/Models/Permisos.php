<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class Permisos extends Model
{
    protected $table = 'permisos';

    public $fillable = [
         
        'descripcion',
        'nit',
        'representante_legal',
        'telefono',
        'logo'

    ];

    protected $guarded = ['id'];
}
