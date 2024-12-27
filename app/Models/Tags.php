<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tags extends Model
{
    //
    protected $connection = 'mongodb';
    protected $fillable = ['name', 'count'];

    // Relationship: Many tags can be on many posts
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, null, 'tags_id', '_id');
    }
}
