@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">Image - Index</div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="/image" method="post" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->has('photo')) 
                        <div class="alert alert-danger">
                            {{ $errors->first('photo') }}
                        </div>
                    @endif
                    <input type="file" name="photo" name="image[]" placeholder="123" id="" multiple required>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
