<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    protected $fillable = [
        'dni',
        'name',
        'email',
        'CV',
        'group',
        'course',
        'password'
    ];
    use HasFactory;


    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(company::class)->withPivot('question');
    }
}
