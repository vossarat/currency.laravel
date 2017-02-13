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

Route::get('/', ['uses'=>'DefaultController@index','as'=>'main']);

//Административная панель
Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){

        Route::get('/', 'AdminController@index')->name('admin');

        // Registration Routes...
        Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'Auth\RegisterController@register');
		
		Route::get('users', 'AdminController@tableUsers')->name('users');
		Route::get('users/edit/{id}', 'AdminController@editUser');
		
		Route::resource('menus','AdminMenuController'); // resource conroller for menu 
		
		
    });


