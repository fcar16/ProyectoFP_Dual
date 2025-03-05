<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Company extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $fillable = ['name', 'website', 'NIF'];
    
    use HasFactory;
    protected $hidden =['created_at', 'updated_at'];
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class)->withPivot('question');
    }
}

