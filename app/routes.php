<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/* 
Route::get('/', function()
{
	return View::make('hello');
}); */
Route::get('/', array('as' => 'any.route.name', 'uses' => 'UserController@index'));

Route::resource('users', 'UserController');
Route::resource('networks', 'NetworkController');
Route::resource('hostnames', 'HostnameController');
Route::get('networks/create/{id}', array('as' => 'un_id', 'uses' => 'NetworkController@create'));
Route::get('hostnames/create/{id}', array('as' => 'us_id', 'uses' => 'HostnameController@create'));
Route::get('users/show', array('as' => 'view', 'uses' => 'UserController@show'));