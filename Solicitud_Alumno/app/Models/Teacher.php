<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'dni',
        'name',
        'email',
        'password'
        
    ];
}
