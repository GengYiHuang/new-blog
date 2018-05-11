@extends('layouts.blog') 

@section('content')
<div id="post-show" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{ $post->title }}</h2>

            <div class="">
                {{ $post->body }}
                <br>

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