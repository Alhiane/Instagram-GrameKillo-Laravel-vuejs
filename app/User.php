<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // whene created a user creat a profile 
    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->profile()->create([
                'title' => $user->username,
            ]);
        });
    }


    // user following profiles relation
    public function following()
    {
        return $this->belongsToMany(Profile::class);
    }

    // posts who user likes
    public function likes()
    {
        return $this->belongsToMany(Post::class);
    }
    

    // relations with profile table
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // relation with post table
    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }

    // relation with Comment table
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
