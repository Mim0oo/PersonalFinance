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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@welcome');
Route::get('/home', 'HomeController@index');

Route::middleware(['auth'])->group(function () {
    Route::resource('income', 'IncomeController');
    Route::resource('source', 'SourceController');
});

