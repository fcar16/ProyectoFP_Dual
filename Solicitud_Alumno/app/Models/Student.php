<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'dni',
        'name',
        'email',
        'CV',
        'group',
        'course',
    ];
    use HasFactory;
}
