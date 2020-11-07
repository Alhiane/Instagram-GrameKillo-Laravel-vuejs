@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="post" class="row">
            <div class="col-md-8">
                <img src="/storage/{{ $post->image }}" alt="" srcset="" class="w-100">
            </div>
            <div class="col-md-4">
                <div class="profile-info">
                    <img src="/storage/{{ $post->user->profile->image }}" alt="">
                    <span class="publisher">
                        <a href="/profile/{{ $post->user->id }}">
                            <b> {{ $post->user->username }} </b>
                        </a>
                    </span>
                    <a href="#">Follow</a>
                </div>

                <div class="caption">
                    <b> {{ $post->user->username }} </b> {{ $post->caption }}
                </div>

            </div>
        </div>
    </div>
@endsection
