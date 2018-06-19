@extends('layouts.blog')

@section('content')
@section('header')
    <header class="masthead" style="background-image: url('/img/message-bg.jpg')">
        <div class="overlay"></div>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>信件</h1>
                        <h2 class="subheading">-鹹魚翻身了，還是鹹魚</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
<div id="message-show" class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="card bg-light mb-3">
                <div class="card-header">主旨：{{ $message->title }}</div>
                <div class="card-body">
                    <pre class="card-title">內文：{{ $message->content }}</pre>
                </div>
            </div>
            <div>
                <span>時間：{{ $message->created_at }}</span>
                <a href="/message/reply/{{ $message->id }}"><button type="button" class="btn btn-success">回信</button></a>
            </div>
        </div>
    </div>
</div>
@section('js')
    <script src="/js/createtime.js"></script>
    <script src="/js/content-length.js"></script>        
@endsection
@endsection
