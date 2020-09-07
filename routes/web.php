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

Route::get('/posts/all-posts' , 'PostController@allPosts');
Route::get('/posts/show/{id}' , 'PostController@show')->name('posts.show');
Route::get('/posts/create' , 'PostController@create');
Route::post('/posts/store' , 'PostController@store');
Route::get('/posts/edit/{id}' , 'PostController@edit');
Route::post('/posts/update/{id}' , 'PostController@update');
Route::get('/posts/delete/{id}' , 'PostController@delete');