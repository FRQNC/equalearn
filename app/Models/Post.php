<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Post extends Model
{
    //
    protected $connection = 'mongodb';

    //relationship
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $appends = ['tags'];

    public function getTagsAttribute(): Collection
    {
        // Fetch the tags from the Tags collection based on the tags_id array
        return Tags::whereIn('_id', $this->tags_id)->get();
    }

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grades::class);
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topics::class);
    }
}
