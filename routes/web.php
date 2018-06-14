<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function() {
    Route::resource('/post', 'PostController');
    Route::get('/user/{id}', 'UserController@index')->name('user.index');
    Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::put('/user/{id}', 'UserController@update')->name('user.update');
    Route::post('/comment/{id}', 'PostController@createComment')->name('comment.create');
    Route::put('/comment/{id}', 'PostController@responseComment')->name('comment.response');
});
Route::get('/image', function () {
    return view('image.index');
});