@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 posts">
                @foreach ($posts as $post)
                    <div class="post-each">
                        <div class="publisher">
                            <img src="/storage/{{ $post->user->profile->image }}" alt="">
                            <span class="publisher">
                                <a href="/profile/{{ $post->user->id }}">
                                    <b> {{ $post->user->username }} </b>
                                </a>
                            </span>
                        </div>
                        {{-- thumbnail --}}
                        <div class="thumbnail">
                            <img src="/storage/{{ $post->image }}" class="w-100" alt="" srcset="">
                        </div>

                        <div class="reaction">
                            @if ($post->likers->count() > 0)
                                <span> likes by
                                    <a href="/profile/{{ $post->likers->last()->id }}">
                                        {{ $post->likers->last()->username }}
                                    </a>
                                    @if ($post->likers->count() > 1)
                                        and
                                        {{ $post->likers->count() }} others
                                    @endif
                                </span>
                            @endif

                            <like-button post-id="{{ $post->id }}" like="{{ auth()->user()
        ? auth()->user()->likes->contains($post->id)
        : false }}">
                            </like-button>

                        </div>
                        <div class="caption">
                            {{ $post->caption }}
                        </div>

                        <comments-box post-id="{{ $post->id }}" count="{{ $post->comments->count() }}">
                        </comments-box>

                    </div>
                @endforeach
            </div>

            <div class="col-4 sidebar">

            </div>
        </div>
    </div>
@endsection
