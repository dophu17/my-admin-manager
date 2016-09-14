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
Route::group(['prefix' => 'sys-adm', 'namespace' => 'Backend'], function () {
	// Route::get('/', function () {
	// 	return redirect()->route('backend.menus');
	// });

	/**
	 * home
	 */
	Route::get('/', ['as' => 'backend.home', 'uses' => 'HomeController@index']);
});