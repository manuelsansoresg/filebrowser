<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::resource('anios', App\Http\Controllers\YearController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::get('users/pass/{user_id}/edit', [App\Http\Controllers\UserController::class, 'passEdit']);
    Route::post('users/pass/{user_id}/store', [App\Http\Controllers\UserController::class, 'passStore'])->name('pass.store');
    Route::resource('archivos', App\Http\Controllers\FileController::class);
});
