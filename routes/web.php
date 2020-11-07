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
// home page
Route::get('/', 'PostsController@index');

//Auth
Auth::routes();

// profile
Route::get('/profile/{id}', 'ProfilesController@show')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{id}', 'ProfilesController@update')->name('profile.update');

// follow
Route::post('/follow/{id}','FollowsController@store')->name('follow.store');

// post
Route::post('/p','PostsController@store');
Route::get('/p/create','PostsController@create');
Route::get('/p/{id}','PostsController@show');

// likes
Route::post('/like/{id}','LikesController@store')->name('like.store');

// comments
Route::get('/comments/{post_id}','CommentsController@show')->name('comments.store');
Route::post('/comments/{post_id}','CommentsController@store')->name('comments.store');