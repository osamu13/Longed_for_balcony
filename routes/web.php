<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//ゲストユーザーログイン
Route::get('guest', 'Auth\LoginController@guestLogin')->name('login.guest');


Route::group(['middleware' => ['auth']], function() {
    Route::get('/posts/search', 'PostController@search')->name('posts.search');
    Route::resource('posts', 'PostController');
    Route::resource('comments', 'CommentController', ['only' => ['store', 'destroy']]);
    Route::resource('users', 'UserController', ['only' => ['show']]);
    Route::get('posts/{post}/likes', 'LikeController@store');
    Route::get('posts/{post}/unlikes', 'LikeController@destroy');
    Route::get('posts/{post}/countlikes', 'LikeController@count');
    Route::get('posts/{post}/haslike', 'LikeController@haslike');
});