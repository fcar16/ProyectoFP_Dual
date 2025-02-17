<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Student extends Authenticatable
{

    use HasApiTokens, Notifiable, HasFactory;
    protected $fillable = [
        'dni',
        'name',
        'email',
        'CV',
        'group',
        'course',
        'password'
    ];



    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(company::class)->withPivot('question');
    }
}
