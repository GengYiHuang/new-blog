@extends('layouts.blog')

@section('content')
@section('header')
    <header class="masthead" style="background-image: url('/img/post-sample-image.jpg')">
        <div class="overlay"></div>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>撰寫文章</h1>
                        <h2 class="subheading">-當你的左臉被人打，那你的左臉就會痛</h2>                  
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

<div id="post-create" class="container-fluid">
    <form action="{{ route('post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-10 col-md-10 col-lg-8 col-xl-7">
                <p>上傳圖片 :</p> 
                <input type="file" name="images[]" placeholder="123" id="" multiple required><br>

                <p>Title :</p> 
                <input type="" name="title" size="105"><br>
    
                <p>Body :</p>
                <textarea name="body" id="" cols="110" rows="10" wrap="hard"></textarea> 
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
