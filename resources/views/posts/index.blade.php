@extends('layouts.blog')

@section('content')
@section('header')
    <header class="masthead" style="background-image: url('/img/post-bg.jpg')">
        <div class="overlay"></div>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>文章列表</h1>
                        <h2 class="subheading">-當你花了60秒去讀一篇文章，就減少了一分鐘的壽命</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
<div id="post-index" class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach ($posts as $post)
                <div class="post-preview">
                    <a href="/post/{{ $post->id }}">
                        <h2 class="post-title">{{ $post->title }}</h2>
                        <pre class="post-subtitle content-preview">{{ $post->body }}</pre>
                    </a>
                    <span class="views">點閱數:{{ $post->views }}</span><p class="post-meta">Posted by&nbsp;<a href="/user/{{ $post->uid }}">{{ $post->user->nickname ?: $post->user->name }}</a>&nbsp;on &nbsp;<span class="createtime">{{ $post->created_at }}</span></p>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
</div>
@section('js')
    <script src="/js/createtime.js"></script>
    <script src="/js/content-length.js"></script>        
@endsection
@endsection
