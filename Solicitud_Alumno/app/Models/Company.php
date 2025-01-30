<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Company extends Model
{
    protected $fillable = ['name', 'website', 'NIF'];
    use HasFactory;

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class)->withPivot('question');
    }
}

