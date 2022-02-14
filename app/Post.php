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
        'category_id',
        'cover',
    ];

    /**
     * RELATIONSHIP WITH CATEGORIES
     */
    public function category() {
        return $this->belongsTo('App\Category');
    }

    /**
     * RELATIONSHIP WITH TAGS
     */
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}   
