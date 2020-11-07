<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class LikesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store($post)
    {
        $post = Post::find($post);
        return auth()->user()->likes()->toggle($post->id);
    }
}
