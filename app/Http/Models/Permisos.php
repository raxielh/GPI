<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class Permisos extends Model
{
    protected $table = 'permisos';

    public $fillable = [
        'descripcion',
'crear',
'leer',
'editar',
'borrar',
'proceso1',
'descripcion_proceso1',
'proceso2',
'descripcion_proceso2',
'proceso3',
'descripcion_proceso3',

    ];

    protected $guarded = ['id'];
}
