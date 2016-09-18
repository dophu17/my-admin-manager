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

	/**
	 * profile
	 */
	Route::get('/profile', ['as' => 'backend.users.profile', 'uses' => 'UserController@getProfile']);
	Route::get('/profile/edit/{id}', ['as' => 'backend.users.profile.edit', 'uses' => 'UserController@getEditProfile']);
	Route::post('/profile/edit/{id}', ['as' => 'backend.users.profile.edit', 'uses' => 'UserController@postEditProfile']);
});


/**
 * auth
 */
Route::get('/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);
