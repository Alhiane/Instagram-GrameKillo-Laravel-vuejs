@extends('layouts.app')

@section('content')
    <div class="container">
        
        <form action="/profile/{{$user->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            {{-- title --}}
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                <div class="col-md-6">                    
                    <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}" required autocomplete="title" autofocus>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- description --}}
            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>
                <div class="col-md-6">                    
                    <textarea id="desc" type="text" class="form-control @error('description') is-invalid @enderror" name="desc" value="{{$user->profile->desc}}" required autocomplete="desc" autofocus cols="30" rows="5">{{ $user->profile->desc }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- url --}}
            <div class="form-group row">
                <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('url') }}</label>
                <div class="col-md-6">                    
                    <input id="url" type="url" class="form-control @error('url') is-invalid @enderror" name="url" value="{{$user->profile->url ?? old('url')}}" required autocomplete="url">
                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- image --}}
            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('image') }}</label>
                <div class="col-md-6">                    
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- button --}}
            <div class="form-group row text-md-right">
                <label class="img col-md-4 col-form-label text-md-right" ></label>
                <div class="col-md-6">
                    <button class="btn btn-primary mt-3 mb-3"> Save </button>
                </div>
            </div>

        </form>

    </div>
@endsection