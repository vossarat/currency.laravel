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

// Auth Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'DefaultController@index')->name('main');
//Route::get('testjson', 'DefaultController@testjson')->name('testjson');

//Административная панель
Route::group(['prefix'=>'admin', 'middleware'=>'auth'],	function() {

		Route::get('/', 'AdminDashboardController@index')->name('adminpanel');

		// Registration Routes...
		Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
		Route::post('register', 'Auth\RegisterController@register')->name('postregister');

		Route::resource('menus','AdminMenuController'); // resource conroller for menu
		Route::resource('users','AdminUserController'); // resource conroller for user

		Route::post('collapsed', function() { //устанавливаем cookie для определени видимости sidebar adminpanel				
				Cookie::has('collapsed') ? Cookie::queue(Cookie::forget('collapsed')) : Cookie::queue('collapsed', true, 60);		
			});
		

	});


