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

//FontEnd post Page Load
Route::get('home-page', 'App\Http\Controllers\FontEndController@HomePage') -> name('home');
Route::get('blog', 'App\Http\Controllers\FontEndController@BlogPage') -> name('blog');
Route::get('blog-single/{slug}', 'App\Http\Controllers\FontEndController@SingleBlogPage') -> name('blog.single');

//frontend product page load
Route::get('shop', 'App\Http\Controllers\FontEndController@ShopPage') -> name('shop');
Route::get('shop-single-page', 'App\Http\Controllers\FontEndController@ShopSinglePage') -> name('shop.single');

//product search by category
Route::get('category-product/{slug}','App\Http\Controllers\FontEndController@ProductByCategory') -> name('category.product');
Route::get('tag-product/{slug}','App\Http\Controllers\FontEndController@ProductByTag') -> name('tag.product');

//single product search
Route::get('product/{slug}','App\Http\Controllers\FontEndController@SingleProduct') -> name('product');

//product search by search box
Route::post('product-search','App\Http\Controllers\FontEndController@ProductSearch') -> name('product.search');


//blog post Search by category
Route::get('category/{slug}', 'App\Http\Controllers\FontEndController@postByCategory') -> name('category.search');

//blog post search by tag
Route::get('tag/{slug}', 'App\Http\Controllers\FontEndController@postByTag') -> name('tag.search');

//post Search By Search Field
Route::post('search', 'App\Http\Controllers\FontEndController@postBySearch') -> name('post.search');


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
Route::post('post-update', 'App\Http\Controllers\PostController@update') -> name('post.update');
Route::get('post-post-unpublished/{id}', 'App\Http\Controllers\PostController@unpublishedCategory') -> name('post.unpublished');
Route::get('post-post-published/{id}', 'App\Http\Controllers\PostController@publishedCategory') -> name('post.published');

//product management Route
Route::resource('product', 'App\Http\Controllers\ProductController');
Route::get('product-edit/{id}', 'App\Http\Controllers\ProductController@edit') -> name('product.edit');
Route::post('product-update', 'App\Http\Controllers\ProductController@update') -> name('product.update');
Route::get('product-unpublished/{id}', 'App\Http\Controllers\ProductController@unpublished') -> name('product.unpublished');
Route::get('product-published/{id}', 'App\Http\Controllers\ProductController@published') -> name('product.published');

//web settings Route
Route::get('settings/logo', 'App\Http\Controllers\SettingsController@LogoPageShow') -> name('logo.index');
Route::put('settings/logo-update', 'App\Http\Controllers\SettingsController@LogoUpdate') -> name('logo.update');

//web settings Route
Route::get('settings/social', 'App\Http\Controllers\SettingsController@SocialPageShow') -> name('social.index');
Route::post('settings/social-update', 'App\Http\Controllers\SettingsController@SocialUpdate') -> name('social.update');


//web client Route
Route::get('settings/client', 'App\Http\Controllers\SettingsController@ClientPageShow') -> name('client.index');
Route::post('settings/client-update', 'App\Http\Controllers\SettingsController@ClientUpdate') -> name('client.update');

//web copyright Route
Route::get('settings/copyright', 'App\Http\Controllers\SettingsController@CopyRightPageShow') -> name('copyright.index');
Route::post('settings/copyright-update', 'App\Http\Controllers\SettingsController@CopyRightUpdate') -> name('copyright.update');