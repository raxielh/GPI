<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class Menus extends Model
{
    protected $table = 'menus';

    public $fillable = [
        'id_padre',
        'descripcion',
        'icono',
        'ruta',
        'tipomenu_id',
        'orden',

    ];

    protected $guarded = ['id'];


}
