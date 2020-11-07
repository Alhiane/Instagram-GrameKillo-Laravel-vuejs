<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    // display
    public function show($user)
    {
        $user = User::findOrFail($user);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        return view('profile.show',compact('user','follows'));
    }

    // Edit
    public function edit(\App\User $user)
    {        
        $this->authorize('update', $user->profile);
        return view('profile.edit',compact('user'));
    }

    // update
    public function update(\App\User $user)
    {           
        $data = request()->validate([
            'title' => 'required',
            'desc' => 'required',
            'url' => 'required',   
            'image' => ''
        ]);                

        // check if user chosen image
        if(request('image')){
            $imagePath = request('image')->store('profiles','public');
            $image = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $image ?? []
        ));

        return redirect('/profile/'. auth()->user()->id);
    }
}
