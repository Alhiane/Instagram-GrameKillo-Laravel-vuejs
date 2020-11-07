<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    // relation with user table
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // users who likes post
    public function likers()
    {
        return $this->belongsToMany(User::class);
    }

    // post comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
