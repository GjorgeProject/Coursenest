<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail',
        'status',
    ];

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class)->orderBy('position');
    }
}
