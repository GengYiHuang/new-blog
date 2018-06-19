@extends('layouts.blog')

@section('content')
@section('header')
    <header class="masthead" style="background-image: url('/img/post-sample-image.jpg')">
        <div class="overlay"></div>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>編輯文章</h1>
                        <h2 class="subheading">-看到邱主任不喜歡的話，就不是男人</h2>                  
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
<div id="post-edit" class="container-fluid">
    <form action="{{ route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put') 
        {{-- 表單只能帶POST跟GET所以要加上面這個 --}}
        <div class="row justify-content-center">
            <div class="col-10 col-md-10 col-lg-8 col-xl-7">
                <span>上傳照片 ：</span><small>(上傳新的照片舊的會被移除)</small><br>
                <input type="file" name="images[]" accept="image/*" multiple><br>
                @if($post->image_path)
                    @foreach(json_decode($post->image_path) as $image)
                        <img style="max-height: 100px;" src="{{ $image }}">
                    @endforeach
                @endif
                <br>
                <br>
                <p>Title :</p> 
                <input type="" name="title" size="100" value={{ $post->title }} required><br>
    
                <p>Body :</p>
                <textarea name="body" id="" cols="100" rows="10" wrap="hard" required>{{ $post->body }}</textarea> 
            </div>
            <br>
        </div><br>

        <div class="row  justify-content-center">
            <div class="col-10 col-md-10 col-lg-8 col-xl-7">
                <button id="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
