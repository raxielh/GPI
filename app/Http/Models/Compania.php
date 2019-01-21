<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
    protected $table = 'companias';

    public $fillable = [
        'descripcion',
        'nit',
        'representante_legal',
        'telefono',
        'logo'
    ];

    protected $guarded = ['id'];
}
