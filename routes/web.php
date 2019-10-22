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


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/forum', 'ForumController@index')->name('forum');
Route::get('/forum/{show}','ForumController@show')->name('forum.show');
Route::get('/channels/{slug}','ForumController@channel')->name('channel');
Route::get('/forum/me','ForumController@first')->name('forum.my');

Route::group(['middleware'=>'auth'],function()
{
    Route::resource('channel','ChannelController');
});

Route::resource('/discussion','DiscussionController');
Route::post('/discussion/{reply}','DiscussionController@reply')->name('discussion.reply');

Route::get('/reply/like/{id}','RepliesController@like')->name('reply.like');
Route::get('/reply/unlike/{id}','RepliesController@unlike')->name('reply.unlike');

Route::get('/discussion/watch/{id}','WatchersController@watch')->name('discussion.watch');
Route::get('/discussion/unwatch/{id}','WatchersController@unwatch')->name('discussion.unwatch');

Route::get('/best/answer/{id}','RepliesController@bestAnswer')->name('best.answer');