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

Auth::routes();

// Application welcome page
Route::get('/home', 'HomeController@index');

/**
 * Group Income
 */
Route::group(['middleware' => 'auth'], function () {
	Route::resource('income', 'IncomeController');
	Route::resource('source', 'SourceController');
	Route::get('unpaid', 'IncomeController@showUnpaid');
});
