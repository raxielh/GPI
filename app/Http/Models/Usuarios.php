<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{

    public $table = 'users';

    public $fillable = [
        'name',
        'email'
    ];

}
