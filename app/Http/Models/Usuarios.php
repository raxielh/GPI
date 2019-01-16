<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{

    protected $table = 'users';

    public $fillable = [
        'name',
        'email'
    ];

    protected $guarded = ['id','password'];

}
