@extends('layouts.blog')

@section('content')
@section('nav-item')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('post.index') }}">文章列表</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('post.create') }}">撰寫文章</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">站內信箱</a>
    </li>
@endsection
@section('header')
    <header class="masthead" style="background-image: url('/img/post-bg.jpg')">
        <div class="overlay"></div>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>文章列表</h1>
                        <h2 class="subheading">-當你花了60秒去讀一篇文章，就減少一分鐘的壽命</h2>
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
                    <p class="post-meta">Posted by&nbsp;<a href="#">{{ $post->user->name }}</a>&nbsp;on &nbsp;<span class="createtime">{{ $post->created_at }}</span></p>
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
