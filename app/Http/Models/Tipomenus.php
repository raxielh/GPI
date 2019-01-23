<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class Tipomenus extends Model
{
    protected $table = 'tipomenus';

    public $fillable = [
        'descripcion',

    ];

    protected $guarded = ['id'];
}
