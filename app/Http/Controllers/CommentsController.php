<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //
    public function store($post)
    {

            $data = request()->validate([
                'body' => 'required',
                'post-id' => ''                    
            ]);
                
            $comment = new Comment();
            $comment->body = request('body');
            $comment->user_id = auth()->user()->id;
            $comment->post_id = $post;
            $comment->save();

            return $comment->where('id',$comment->id)->with('user.profile')->get();
        
    }

    public function show($post)
    {
        return Comment::where('post_id',$post)->with('user.profile')->orderBy('created_at','DESC')->get();
    }
}
