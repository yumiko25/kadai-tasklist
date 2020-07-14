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

Route::get('/', 'TasksController@index');
Route::resource('tasks', 'TasksController');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('tasks', 'TasksController', ['only' => ['create','store', 'edit','destroy']]);
});
// CRUD
// メッセージの個別詳細ページ表示
// Route::get('messages/{id}', 'MessagesController@show');
// // メッセージの新規登録を処理（新規登録画面を表示するためのものではありません）
// Route::post('messages', 'MessagesController@store');
// // メッセージの更新処理（編集画面を表示するためのものではありません）
// Route::put('messages/{id}', 'MessagesController@update');
// // メッセージを削除
// Route::delete('messages/{id}', 'MessagesController@destroy');

// // index: showの補助ページ
// Route::get('messages', 'MessagesController@index')->name('messages.index');
// // create: 新規作成用のフォームページ
// Route::get('messages/create', 'MessagesController@create')->name('messages.create');
// // edit: 更新用のフォームページ
// Route::get('messages/{id}/edit', 'MessagesController@edit')->name('messages.edit');