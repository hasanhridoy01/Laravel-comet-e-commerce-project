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

//FontEnd Page Load
Route::get('home-page', 'App\Http\Controllers\FontEndController@HomePage') -> name('home');
Route::get('blog', 'App\Http\Controllers\FontEndController@BlogPage') -> name('blog');
Route::get('blog-single/{slug}', 'App\Http\Controllers\FontEndController@SingleBlogPage') -> name('blog.single');

Auth::routes();

//Category Management Route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('post-category', 'App\Http\Controllers\CategoryController');
Route::get('post-category-edit/{id}', 'App\Http\Controllers\CategoryController@edit');
Route::post('post-category-update', 'App\Http\Controllers\CategoryController@update') -> name('category.update');
Route::get('post-category-unpublished/{id}', 'App\Http\Controllers\CategoryController@unpublishedCategory') -> name('category.unpublished');
Route::get('post-category-published/{id}', 'App\Http\Controllers\CategoryController@publishedCategory') -> name('category.published');

//tag management Route
Route::resource('tag', 'App\Http\Controllers\TagController');
Route::get('tag-edit/{id}', 'App\Http\Controllers\TagController@edit') -> name('tag.edit');
Route::post('tag-update', 'App\Http\Controllers\TagController@update') -> name('tag.update');
Route::get('tag-unpublished/{id}', 'App\Http\Controllers\TagController@unpublishedTags') -> name('tag.unpublished');
Route::get('tag-published/{id}', 'App\Http\Controllers\TagController@publishedTags') -> name('tag.published');

//post management Route
Route::resource('post', 'App\Http\Controllers\PostController');
Route::get('post-edit/{id}', 'App\Http\Controllers\PostController@edit') -> name('post.edit');
Route::get('post-post-unpublished/{id}', 'App\Http\Controllers\PostController@unpublishedCategory') -> name('post.unpublished');
Route::get('post-post-published/{id}', 'App\Http\Controllers\PostController@publishedCategory') -> name('post.published');
