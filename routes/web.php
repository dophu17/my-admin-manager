<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/**
 * admin
 */
Route::group(['prefix' => 'sys-adm', 'namespace' => 'Backend', 'middleware' => 'auth'], function () {
	/**
	 * home
	 */
	Route::get('/', ['as' => 'backend.home', 'uses' => 'HomeController@index']);

	/**
	 * user
	 */
	Route::get('/users', ['as' => 'backend.users', 'uses' => 'UserController@index']);
	Route::get('/users/add', ['as' => 'backend.users.add', 'uses' => 'UserController@getAdd']);
	Route::post('/users/add', ['as' => 'backend.users.add', 'uses' => 'UserController@postAdd']);
	Route::get('/users/edit/{id}', ['as' => 'backend.users.edit', 'uses' => 'UserController@getEdit']);
	Route::post('/users/edit/{id}', ['as' => 'backend.users.edit', 'uses' => 'UserController@postEdit']);
	Route::get('/users/delete/{id}', ['as' => 'backend.users.delete', 'uses' => 'UserController@getDelete']);

	/**
	 * profile
	 */
	Route::get('/profile/{id}', ['as' => 'backend.users.profile', 'uses' => 'UserController@getProfile']);
	Route::post('/profile/edit/{id}', ['as' => 'backend.users.profile.edit', 'uses' => 'UserController@postEditProfile']);

	/**
	 * category
	 */
	Route::get('/categories', ['as' => 'backend.categories', 'uses' => 'CategoryController@index']);
	Route::get('/categories/add', ['as' => 'backend.categories.add', 'uses' => 'CategoryController@getAdd']);
	Route::post('/categories/add', ['as' => 'backend.categories.add', 'uses' => 'CategoryController@postAdd']);
	Route::get('/categories/edit/{id}', ['as' => 'backend.categories.edit', 'uses' => 'CategoryController@getEdit']);
	Route::post('/categories/edit/{id}', ['as' => 'backend.categories.edit', 'uses' => 'CategoryController@postEdit']);
	Route::get('/categories/delete/{id}', ['as' => 'backend.categories.delete', 'uses' => 'CategoryController@getDelete']);

	/**
	 * product
	 */
	Route::get('/products', ['as' => 'backend.products', 'uses' => 'ProductController@index']);
	Route::get('/products/add', ['as' => 'backend.products.add', 'uses' => 'ProductController@getAdd']);
	Route::post('/products/add', ['as' => 'backend.products.add', 'uses' => 'ProductController@postAdd']);
	Route::get('/products/edit/{id}', ['as' => 'backend.products.edit', 'uses' => 'ProductController@getEdit']);
	Route::post('/products/edit/{id}', ['as' => 'backend.products.edit', 'uses' => 'ProductController@postEdit']);
	Route::get('/products/delete/{id}', ['as' => 'backend.products.delete', 'uses' => 'ProductController@getDelete']);

	/**
	 * contact
	 */
	Route::get('/contacts', ['as' => 'backend.contacts', 'uses' => 'ContactController@index']);
	Route::get('/contacts/detail/{id}', ['as' => 'backend.contacts.detail', 'uses' => 'ContactController@getDetail']);
	Route::get('/contacts/delete/{id}', ['as' => 'backend.contacts.delete', 'uses' => 'ContactController@getDelete']);

	/**
	 * news
	 */
	Route::get('/news', ['as' => 'backend.news', 'uses' => 'NewsController@index']);
	Route::get('/news/add', ['as' => 'backend.news.add', 'uses' => 'NewsController@getAdd']);
	Route::post('/news/add', ['as' => 'backend.news.add', 'uses' => 'NewsController@postAdd']);
	Route::get('/news/edit/{id}', ['as' => 'backend.news.edit', 'uses' => 'NewsController@getEdit']);
	Route::post('/news/edit/{id}', ['as' => 'backend.news.edit', 'uses' => 'NewsController@postEdit']);
	Route::get('/news/delete/{id}', ['as' => 'backend.news.delete', 'uses' => 'NewsController@getDelete']);

	/**
	 * setting
	 */
	Route::get('/settings', ['as' => 'backend.settings', 'uses' => 'SettingController@index']);
	Route::post('/settings', ['as' => 'backend.settings', 'uses' => 'SettingController@postIndex']);
});


/**
 * auth
 */
Auth::routes();