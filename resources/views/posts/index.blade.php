@extends('layouts.blog')

@section('content')
<div id="post-index" class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach ($posts as $post)
                <div class="post-preview">
                    <a href="/post/{{ $post->id }}">
                        <h2 class="post-title">{{ $post->title }}</h2>
                        <h3 class="post-subtitle">{{ $post->body }}</h3>
                    </a>
                    <p class="post-meta">Posted by&nbsp;<a href="#">{{ $post->user->name }}</a>&nbsp;on &nbsp;<span class="updatetime">{{ $post->updated_at }}</span></p>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
</div>
@section('js')
    <script src="/js/updatetime.js"></script>
@endsection
@endsection
