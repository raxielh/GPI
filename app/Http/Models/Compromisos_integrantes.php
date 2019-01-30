<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class Compromisos_integrantes extends Model
{
    protected $table = 'compromisos_integrantes';

    public $fillable = [
        'integrantes_id',
'compromisos_maestros_id',

    ];

    protected $guarded = ['id'];
}
