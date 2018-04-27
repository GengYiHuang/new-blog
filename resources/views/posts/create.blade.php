@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post</div>

                <div class="card-body">
                    Create 
                </div>
            </div>
        </div>
    </div>
    <br><br>

    <form action="{{ route('post.store')}}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="col-8">
                <p>Title :</p> 
                <input type="" name="title" size="100"><br>
    
                <p>Body :</p>
                <textarea name="body" id="" cols="100" rows="10"></textarea> 
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
