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

Route::get('/', 'Website\SiteController@index')->name('website-home');

Auth::routes();

Route::group(['prefix' => 'painel', 'middleware' => 'auth'], function() {

    Route::get('/', 'Painel\HomeController@index')->name('painel-home');
    Route::get('/home', 'Painel\HomeController@index')->name('painel-home');

    Route::get('/posts', 'Painel\PostController@index')->name('painel-posts');
    Route::get('posts/create', 'Painel\PostController@create')->name('painel-add-post');
    Route::get('/post/{id}', 'Painel\PostController@edit')->name('painel-post');
    Route::post('post', 'Painel\PostController@store')->name('painel-save-post');
    Route::post('post/delete', 'Painel\PostController@delete')->name('painel-delete-post');

    Route::get('categories', 'Painel\CategoryController@index')->name('painel-categories');
    Route::get('categories/create', 'Painel\CategoryController@create')->name('painel-add-category');
    Route::get('category/{id}', 'Painel\CategoryController@edit')->name('painel-category');
    Route::post('category', 'Painel\CategoryController@store')->name('painel-save-category');
    Route::post('category/delete', 'Painel\CategoryController@delete')->name('painel-delete-category');
});
