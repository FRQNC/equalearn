<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Article extends Model
{
    protected $collection = 'articles';
    protected $fillable = ['title', 'description', 'date', 'views', 'comments', 'user_id'];
}