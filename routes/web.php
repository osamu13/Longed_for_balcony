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
    Route::resource('posts', 'PostController');
    Route::resource('comments', 'CommentController');
});