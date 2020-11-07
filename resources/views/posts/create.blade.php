@extends('layouts.app')

@section('content')
<div class="container">
    <div id="post">
        <h4 class="text-center pb-5 pt-3"> Add New Post </h4>
        <form action="/p" method="POST" enctype="multipart/form-data">
            @csrf;
            
                {{-- caption --}}            
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label text-md-right">{{ __('Caption') }}</label>
                    <div class="col-md-6">                    
                        <textarea id="caption" type="caption" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus cols="30" rows="5"></textarea>
                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- image --}}
                <div class="form-group row">
                    <label class="img col-md-4 col-form-label text-md-right" > {{ __('Image') }} </label>
                    <div class="col-md-6">                    
                        <input type="file" name="image" id="image" class="form-control @error('caption') is-invalid @enderror" >
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row text-md-right">
                    <label class="img col-md-4 col-form-label text-md-right" ></label>
                    <div class="col-md-6">
                        <button class="btn btn-primary mt-3 mb-3"> Post </button>
                    </div>
                </div>
            
        </form>
    </div>
</div>
@endsection
