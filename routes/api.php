<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');
Route::post('refresh', 'AuthController@refresh');
Route::post('me', 'AuthController@me');
Route::post('profile', 'ProfileController@update');
Route::middleware(['auth:api' , 'forbid-banned-user'])->group(function(){
Route::post('me', 'AuthController@me');
Route::post('profile', 'ProfileController@update');
Route::resource('/post', 'PostController');
Route::post('/post/{post}', 'PostController@update');//route for update working only with post no put/patch

Route::get('/post/{post}', 'CommentController@index');
Route::post('comment', 'CommentController@store');
Route::get('comment/{id}', 'CommentController@edit');
Route::post('comment/{id}', 'CommentController@update');
Route::delete('comment/{id}', 'CommentController@delete');
//panel admin

Route::get('admin/dashboard', 'admin\DashController@index');
Route::get('admin/posts', 'admin\PostsController@index');
Route::get('admin/posts/{id}', 'admin\PostsController@index');
Route::post('admin/posts/{id}', 'admin\PostsController@approve');
Route::post('admin/posts/{id}', 'admin\PostsController@update');
Route::delete('admin/posts/{id}', 'admin\PostsController@destroy');

Route::get('admin/users', 'admin\UsersController@index');
Route::get('admin/users/{user}', 'admin\UsersController@edit');
Route::post('admin/users/{id}/edit', 'admin\UsersController@update');
Route::delete('admin/users/{id}/', 'admin\UsersController@destroy');
Route::post('admin/users/{id}/', 'admin\UsersController@ban');
});