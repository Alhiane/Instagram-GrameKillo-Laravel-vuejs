@extends('layouts.app')

@section('content')
<div class="container">
    <div id="profile">

    <div class="row justify-content-center pt-3" id="profile-header">
        <div class="col-md-3 image-profile">
            {{-- user avatar --}}        
        <img src="/storage/{{ $user->profile->image }}" alt="" srcset="">        
        </div>
        <div class="col-md-9 information-profile">
            {{-- profile name --}}
            <div class="profile-name d-flex">
                {{-- name --}}
                <h2> {{ $user->username }} </h2>
                
                {{-- button follow --}}
                @auth                    
                    @if (auth()->user()->id != $user->id)                    
                    <follow-button user-id="{{$user->id}}" follows="{{$follows}}" />
                    @endif
                @endauth

            </div>

            {{-- followrs & following --}}
            <div class="profile-follow-ers-ing">
                <ul>
                    <li> 
                         {{$user->posts->count()}}
                          Posts 
                </li>
                    <li> 
                        <a href="http://" target="_blank" rel="noopener noreferrer"> {{$user->profile->followrs->count()}}
                    </a>  followers 
                </li>
                    <li> 
                        <a href="http://" target="_blank" rel="noopener noreferrer"> {{$user->following->count()}}
                    </a> following 
                </li>
                </ul>
            </div>

            {{-- full name --}}
            <div class="profile-full-name pt-2">
                <b> {{ $user->profile->title ?? ' ' }} </b>
            </div>

            {{-- profile description --}}
            <div class="profile-description">
                <p> 
                    {{ $user->profile->desc ?? ' ' }}
                </p>
            </div>

            {{-- profile link --}}
            <div class="profile-link">
                <a href="{{ $user->profile->url ?? '#' }}" target="_blank" rel="noopener noreferrer"> {{ $user->profile->url ?? ' ' }} </a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center pt-5" id="profile-body">
        {{-- btn add and showing posts --}}
        <div class="actions col-md-12 pb-5">
            <ul>
                @can('update', $user->profile)                    
                    <li> <a href="/profile/{{$user->id}}/edit"> Edit Profile </a> </li>
                @endcan                
                <li> <a href="/p/create"> Add Post </a> </li>                
            </ul>
        </div>

        {{-- showing profile posts --}}
        <div class="col-md-12">
            <div class="row posts">
                {{-- single post --}}
                @foreach ($user->posts as $post)                    
                    <div class="post col-md-4">
                        {{-- posts image --}}
                        <div class="post-image">
                            <a href="/p/{{ $post->id }}">
                                <img src="/storage/{{ $post->image }}" alt="">
                            </a>
                        </div>
                        
                    </div>
                @endforeach

            </div>
        </div>

    </div>

    </div>
</div>
@endsection
