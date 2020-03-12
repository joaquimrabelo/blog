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
Route::get('/category/{slug}', 'Website\SiteController@category')->name('website-category');
Route::get('/post/{slug}', 'Website\SiteController@post')->name('website-post');

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

    Route::get('users', 'Painel\UserController@index')->name('painel-users');
    Route::get('users/create', 'Painel\UserController@create')->name('painel-add-user');
    Route::get('user/{id}', 'Painel\UserController@edit')->name('painel-user');
    Route::post('user', 'Painel\UserController@store')->name('painel-save-user');
    Route::post('user/delete', 'Painel\UserController@delete')->name('painel-delete-user');

    Route::get('groups', 'Painel\GroupController@index')->name('painel-groups');
    Route::get('groups/create', 'Painel\GroupController@create')->name('painel-add-group');
    Route::get('group/{id}', 'Painel\GroupController@edit')->name('painel-group');
    Route::post('group', 'Painel\GroupController@store')->name('painel-save-group');
    Route::post('group/delete', 'Painel\GroupController@delete')->name('painel-delete-group');
});
