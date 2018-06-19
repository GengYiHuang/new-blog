@extends('layouts.blog')

@section('content')
@section('header')
    <header class="masthead" style="background-image: url('/img/home-bg.jpg')">
        <div class="overlay"></div>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>個人頁面</h1>
                        <h2 class="subheading">-一週不見，如隔七日</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection




<div id="user-index" class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="card user-info">
                <div class="card-header">
                    <img class="avatar" src={{ $user->avatar ?: "/img/avatar-default.png" }} >
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span>名字</span><span class="text-right">{{ $user->name }}</span></li>
                    <li class="list-group-item"><span>email</span><span class="text-right">{{ $user->email }}</span></li>
                    <li class="list-group-item"><span>暱稱</span><span class="text-right">{{ $user->nickname ?: "不公開" }}</span></li>
                    <li class="list-group-item"><span>性別</span><span class="text-right">{{ $user->sex ?: "不公開" }}</span></li>
                    <li class="list-group-item"><span>生日</span><span class="text-right">{{ $user->birthday ?: "不公開" }}</span></li>
                    <li class="list-group-item"><span>星座</span><span class="text-right">{{ $user->constellation ?: "不公開" }}</span></li>
                    <li class="list-group-item "><pre class="selfintro">{{ $user->selfintro ?: "無自我介紹" }}</pre></li>
                </ul>
            </div>
            @if(Auth::user()->id == $user->id)
                <div class="edit-button"><a href="/user/{{ Auth::user()->id }}/edit"><button class="btn-sm btn-outline-warning">編輯資料</button></a></div>
            @else
                <div class="edit-button"><a href="/message/create/{{ $user->id }}"><button class="btn-sm btn-outline-warning">寫信給他</button></a></div>
            @endif
            <br><br>
            <div>
                @foreach ($posts as $post)
                <div class="post-preview">
                    <a href="/post/{{ $post->id }}">
                        <h2 class="post-title">{{ $post->title }}</h2>
                        <pre class="post-subtitle content-preview">{{ $post->body }}</pre>
                    </a>
                    <span class="views">點閱數:{{ $post->views }}</span><p class="post-meta">Posted by&nbsp;<a href="#">{{ $post->user->name }}</a>&nbsp;on &nbsp;<span class="createtime">{{ $post->created_at }}</span></p>
                </div>
                <hr>
                @endforeach
            </div>
            
        </div>
    </div>
</div>
@section('js')
    <script src="/js/createtime.js"></script>
    <script src="/js/content-length.js"></script>        
@endsection
@endsection