@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $post->title }}</div>

                <div class="card-body">
                    {{ $post->body }}
                    @if($post->image_path)  
                        @foreach(json_decode($post->image_path) as $image)
                            <img src="{{ $image }}">
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
