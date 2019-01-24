<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class Roles extends Model
{
    protected $table = 'roles';

    public $fillable = [
        'rolesmaestros_id',
        'menus_id',
        'permisos_id',

    ];

    protected $guarded = ['id'];



}
