@extends('layouts.blog') 

@section('content')
@section('header')
    <header class="masthead" style="background-image: url('/img/post-sample-image.jpg')">
        <div class="overlay"></div>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h2 class="subheading">-臉上的快樂，</h2>
                        <h2 class="subheading">&nbsp;別人看得到。</h2>
                        <h2 class="subheading">&nbsp;心裡的痛，</h2>
                        <h2 class="subheading">&nbsp;又有誰能感覺到?</h2>                        
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
<div id="post-show" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/user/{{ $post->uid }}">
                <div class="poster-block">
                    <img class="poster-avatar" src={{ $post->user->avatar ?: "/img/avatar-default.png"}}>
                    <span class="poster-name">{{ $post->user->nickname ?: $post->user->name }}</span>
                </div>
            </a><br>
            <h2>{{ $post->title }}</h2>

            <div>
                <pre>{{ $post->body }}</pre>

                @if($post->image_path)
                    @foreach(json_decode($post->image_path) as $image)
                        <img src="{{ $image }}"><br>
                    @endforeach
                @endif
                <div class="inline">
                    <small>撰寫時間:{{ $post->created_at }}</small>
                </div>
                @if(Auth::user()->id == $post->uid)
                    <div class="button-block">
                        <a href="/post/{{ $post->id }}/edit"><button class="btn-sm btn-outline-warning inline">編輯文章</button></a>                
                        <form class="inline" action="{{ route('post.destroy', $post->id)}}" method="POST">
                            {{ csrf_field() }} 
                            @method('delete')
                            <button class="btn-sm btn-outline-danger" type="submit">刪除文章</button>
                        </form>    
                    </div>
                @endif
            </div>
        </div>
    </div>
    <hr>
    <div>
        @if((Auth::user()->id != $post->uid))
            <div class="row justify-content-center">
                <div class="card border-primary col-md-8">
                    <div class="card-body text-primary">
                        <form action="{{ route('comment.create', $post->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{ Auth::user()->avatar ?: "/img/avatar-default.png" }}" class="comment-avatar">
                                    <div class="comment-name">
                                        {{ Auth::user()->nickname ?: Auth::user()->name }}
                                    </div>
                                </div>
                                <div class="col-9">
                                    <textarea name="comment" cols="50" rows="6" wrap='hard' placeholder="留了言就收不回來了 送出去之前請三思喔喔喔喔喔喔喔..."></textarea>
                                </div>
                            </div>
                            <div class="comment-button-block">
                                <input type="submit" value="送出">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
        <div class="comment-block row justify-content-center">
            @foreach($comments as $key => $comment)
                <div class="card bg-light col-md-8 single-comment">
                    <div class="card-header comment-header">
                        <div>
                            #{{ $key+1 }}樓
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <img src="{{ $comment->user->avatar ?: "/img/avatar-default.png" }}" class="comment-avatar">
                                <div class="comment-name">
                                    {{ $comment->user->nickname ?: $comment->user->name }}
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="comment-text-block">
                                    <pre>{{ $comment->content }}</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($comment->response)
                        <div class="card-body comment-body">
                            <img class="comment-poster-avatar" src={{ $post->user->avatar ?: "/img/avatar-default.png"}}>
                            <span class="response-text">{{ $comment->response }}</span>
                        </div>
                    @elseif(Auth::user()->id == $post->uid)
                        <div class="card-body comment-body">
                            <form action="{{ route('comment.response', $comment->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <img class="comment-poster-avatar" src={{ $post->user->avatar ?: "/img/avatar-default.png"}}>
                                <input type="text" name="response" id="response" class="response">
                            </form>
                        </div>
                    @endif
                </div>
                {{-- {{ $comment->content }}
                {{ $comment->user->nickname ?: $comment->user->name }} --}}
            @endforeach
        </div>
        
    </div>
    
</div>
@endsection