<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topics extends Model
{
    //
    protected $connection = 'mongodb';

    // Relationship: One topic can be on many posts
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
