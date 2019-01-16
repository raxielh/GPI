<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{

    protected $table = 'users';

    public $fillable = [
        'username',
        'personas_id',
        'email'
    ];

    protected $guarded = ['id','password'];

}
