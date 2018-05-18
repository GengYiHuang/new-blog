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
            <h2>{{ $post->title }}</h2>

            <div>
                <pre>{{ $post->body }}</pre>

                @if($post->image_path)
                    @foreach(json_decode($post->image_path) as $image)
                        <img src="{{ $image }}"><br>
                    @endforeach
                @endif
                <div class="inline">
                    <small>最後編輯時間:{{ $post->updated_at }}</small>
                </div>
                <div class="button-block">
                    <a href="/post/{{ $post->id }}/edit"><button class="btn-sm btn-outline-warning inline">編輯文章</button></a>                
                    <form class="inline" action="{{ route('post.destroy', $post->id)}}" method="POST">
                        {{ csrf_field() }} @method('delete')
                        <button class="btn-sm btn-outline-danger" type="submit">刪除文章</button>
                    </form>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection