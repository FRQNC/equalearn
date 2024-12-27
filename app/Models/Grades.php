<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grades extends Model
{
    //
    protected $connection = 'mongodb';

    // Relationship: One grade can be on many posts
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
