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
Route::middleware(['auth' , 'forbid-banned-user'])->group(function(){
//pages
Route::get('/home', 'HomeController@index')->name('home');
//profiling
Route::get('profile','ProfileController@index')->name('profile.index');
Route::post('profile','ProfileController@update')->name('profile.update');
//Route::patch('profile/update','ProfileController@update')->name('profile.update');
//posts
Route::resource('/post', 'PostController');
//comments
Route::post('comment', ['uses' => 'CommentController@store', 'as' => 'comment.store']);
Route::get('comment/{id}/edit', ['uses' => 'CommentController@edit', 'as' => 'comment.edit']);
Route::put('comment/{id}', ['uses' => 'CommentController@update', 'as' => 'comment.update']);
Route::patch('comment/{id}', ['uses' => 'CommentController@update', 'as' => 'comment.update']);
Route::delete('comment/{id}', ['uses' => 'CommentController@destroy', 'as' => 'comment.destroy']);
Route::get('comment/{id}/delete', ['uses' => 'CommentController@delete', 'as' => 'comment.delete']);
//panel admin posts
Route::get('admin/posts', 'Admin\PostsController@index')->name('admin.posts.index');
Route::put('admin/posts', 'Admin\PostsController@approve')->name('admin.posts.approve');
Route::get('admin/posts/{post}/edit', 'Admin\PostsController@edit')->name('admin.posts.edit');
Route::put('admin/posts/{post}', 'Admin\PostsController@update')->name('admin.posts.update');
Route::delete('admin/posts/{post}/delete', 'Admin\PostsController@destroy')->name('admin.posts.destroy');
//panel admin  users
Route::get('admin/dashboard', 'Admin\DashboardController@index')->name('admin.index');
Route::get('admin/users', 'Admin\UsersController@index')->name('admin.users.index');
Route::post('admin/users/{user}/edit', 'Admin\UsersController@edit')->name('admin.users.edit');
Route::put('admin/users/{user}', 'Admin\UsersController@update')->name('admin.users.update');
Route::patch('admin/users/{user}', 'Admin\UsersController@update')->name('admin.users.update');
Route::delete('admin/users/{user}/delete', 'Admin\UsersController@destroy')->name('admin.users.destroy');
Route::post('admin/users/{user}', 'Admin\UsersController@ban')->name('admin.users.ban');
});
