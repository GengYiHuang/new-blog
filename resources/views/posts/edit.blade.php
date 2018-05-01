@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post</div>

                <div class="card-body">
                    Edit
                </div>
            </div>
        </div>
    </div>
    <br><br>

    <form action="{{ route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put') 
        {{-- 表單只能帶POST跟GET所以要加上面這個 --}}
        <div class="row justify-content-center">
            <div class="col-8">
                <input type="file" name="images[]" accept="image/*" multiple><br>
                @if($post->image_path)
                    @foreach(json_decode($post->image_path) as $image)
                        <img style="max-height: 100px;" src="{{ $image }}">
                    @endforeach
                @endif
                <br>
                <br>
                <p>Title :</p> 
                <input type="" name="title" size="100" value={{ $post->title }}><br>
    
                <p>Body :</p>
            <textarea name="body" id="" cols="100" rows="10">{{ $post->body }}</textarea> 
            </div>
            <br>
        </div><br>

        <div class="row  justify-content-center">
            <div class="col-8">
                <button id="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
