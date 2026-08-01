<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\SourceController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'welcome']);
Route::get('/home', [HomeController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::resource('income', IncomeController::class);
    Route::resource('source', SourceController::class);
});
