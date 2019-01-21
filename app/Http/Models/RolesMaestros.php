<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolesMaestros extends Model
{
    protected $table = 'rolesmaestros';

    public $fillable = [
        'nombre_largo',
        'nombre_corto',
        'descripcion',
    ];

    protected $guarded = ['id'];

}
