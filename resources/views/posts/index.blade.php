@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">Post - Index</div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach ($posts as $post)
                    <div class="card-header">{{ $post->title }}</div>
                    <div class="card-body">
                        {{ $post->body }}
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>
</div>
@endsection
