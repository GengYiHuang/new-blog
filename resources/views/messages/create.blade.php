@extends('layouts.blog')

@section('content')
@section('header')
    <header class="masthead" style="background-image: url('/img/message-bg.jpg')">
        <div class="overlay"></div>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>撰寫信件</h1>
                        <h2 class="subheading">-如果我說的不是事實，這顆曲棍球我就當場給他吞下去</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
<div id="message-create" class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form action="{{ route('message.store', $send_to)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card bg-light mb-3">
                    <div class="card-header">主旨：<input type="text" name="title" id="title" required value={{ $title ? "Re:".$title : "" }}></div>
                    <div class="card-body">
                        <h5 class="card-title">內文：<br><textarea name="content" id="content" cols="66" rows="5" required></textarea></h5>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">寄信</button>
            </form>
        </div>
    </div>
</div>
@section('js')
    <script src="/js/createtime.js"></script>
    <script src="/js/content-length.js"></script>        
@endsection
@endsection
