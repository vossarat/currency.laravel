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

/*Route::get('/', function () {
	return view('welcome');
});*/

Auth::routes();

Route::get('/', 'DefaultController@index');

Route::get('/home', ['uses'=>'HomeController@index','as'=>'home']);

//Административная панель
Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function() {
	
	Route::get('/', ['uses'=>'AdminPanelController@index','as'=>'panel']);
	
});


