<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class registro_lluvia extends Model
{
    protected $table = 'registro_lluvia';

    public $fillable = [
        'mm',

    ];

    protected $guarded = ['id'];
}
