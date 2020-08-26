<?php

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
Route::get('/contact' , 'ContactController@index')->name('contact');
Auth::routes();
//Route::middleware(['auth'])->group(function(){
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/post', 'PostController');
//Route::get('post/{post}', 'PostController@show');
	// Comments
Route::post('comment', ['uses' => 'CommentController@store', 'as' => 'comment.store']);
Route::get('comment/{id}/edit', ['uses' => 'CommentController@edit', 'as' => 'comment.edit']);
Route::put('comment/{id}', ['uses' => 'CommentController@update', 'as' => 'comment.update']);
Route::patch('comment/{id}', ['uses' => 'CommentController@update', 'as' => 'comment.update']);
Route::delete('comment/{id}', ['uses' => 'CommentController@destroy', 'as' => 'comment.destroy']);
Route::get('comment/{id}/delete', ['uses' => 'CommentController@delete', 'as' => 'comment.delete']);
//});
//Route::any('comment/{post_id}','CommentController@store')->name('comment.store');



    //Route::resource('/comment', 'CommentController');
//comments
//Route::post('/post/{post}', 'CommentController@show');
//Route::any('/comment/{post}','CommentController');
//Route::post('/comment/{post_id}','CommentController@store')->name('comment.store');
