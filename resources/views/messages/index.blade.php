@extends('layouts.blog')

@section('content')
@section('header')
    <header class="masthead" style="background-image: url('/img/message2-bg.jpg')">
        <div class="overlay"></div>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>站內信箱</h1>
                        <h2 class="subheading">-覺得薪水30000不合理?那就當多做的是在做功德，功德台灣</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
<div id="message-index" class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active message-title" disabled>
                    收件夾
                </button>
                @if(!count($messages))
                    <button type="button" class="list-group-item list-group-item-action" disabled>收件夾無信件</button>
                @else
                    @foreach($messages as $message)
                        <a href="/message/show/{{ $message->id }}"><button type="button" class="list-group-item list-group-item-action {{ $message->read ? "" : "bold" }}">
                            <span>{{ $message->title }}</span>
                            <span class="message-span">form {{ $message->user->nickname ?: $message->user->name }}</span>
                        </button></a>
                    @endforeach    
                    @if (session('message'))
                        <div class="display-none" id="is-success">
                            success
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
@section('js')
    <script src="/js/alert.js"></script>
@endsection
@endsection
