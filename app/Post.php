<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * MASS ASSIGNMENT
     */

    protected $fillable = [
        'title',
        'content',
        'slug',
    ];
}
