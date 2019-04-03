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
Route::get('/threads', 'ThreadController@index');
Route::get('/threads/create', 'ThreadController@create');
Route::get('/threads/{channel}/{thread}', 'ThreadController@show');
Route::post('/threads', 'ThreadController@store');
// index, create, store, show 등이 모두 갖추어져 있는 경우에는 라우트 파일에 resource로 등록
// Route::resource('threads', 'ThreadController');

Route::post('/threads/{channel}/{thread}/replies', 'ReplyController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');