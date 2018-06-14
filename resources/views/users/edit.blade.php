@extends('layouts.blog')

@section('content')
@section('header')
    <header class="masthead" style="background-image: url('/img/post-bg.jpg')">
        <div class="overlay"></div>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>個人資料編輯</h1>
                        <h2 class="subheading">-一例一休?不要跟我說，去跟你們老闆說啊</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

<div id="user-edit" class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="card user-info">
                <form action="{{ route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put') 
                    <div class="card-header">
                        <img class="avatar" src={{ $user->avatar ?: "/img/avatar-default.png" }} >
                        <span>大頭貼：</span>
                        <input type="file" name="avatar" accept="image/*">
                    </div>
                    <ul class="list-group list-group-flush">
                        <table>
                            <tr class="list-group-item">
                                <td><span>暱稱：</span></td>
                                <td><input type="text" name="nickname" value={{ $user->nickname }}></input></td>
                            </tr>
                            <tr class="list-group-item">
                                <td><span>性別：</span></td>
                                <td><span class="no-display" id="sex-value">{{ $user->sex }}</span>
                                    <select name="sex">
                                        <option></option>
                                        <option id="男">男</option>
                                        <option id="女">女</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="list-group-item">
                                <td><span>生日：</span></td>
                                <td><input type="date" name="birthday" value={{ $user->birthday}}></td>
                            </tr>
                            <tr class="list-group-item">
                                <td><span>星座：</span></td>
                                <td><span class="no-display" id="constellation-value">{{ $user->constellation }}</span>
                                    <select name="constellation" value={{ $user->constellation }}>
                                        <option></option>
                                        <option id="摩羯座">摩羯座</option>
                                        <option id="水瓶座">水瓶座</option>
                                        <option id="雙魚座">雙魚座</option>
                                        <option id="牡羊座">牡羊座</option>
                                        <option id="金牛座">金牛座</option>
                                        <option id="雙子座">雙子座</option>
                                        <option id="巨蟹座">巨蟹座</option>
                                        <option id="獅子座">獅子座</option>
                                        <option id="處女座">處女座</option>
                                        <option id="天秤座">天秤座</option>
                                        <option id="天蠍座">天蠍座</option>
                                        <option id="射手座">射手座</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="list-group-item">
                                <td>
                                    <span>自我介紹：</span>
                                    <br>
                                    <textarea class="selfintro" name="selfintro" cols="75" rows="5">{{ $user->selfintro }}</textarea>
                                    <input type="submit" value="送出">
                                </td>
                            </tr>
                        </table>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</div>
@section('js')
    <script src="/js/selectoption.js"></script>
@endsection
@endsection