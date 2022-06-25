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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::resource('anios', App\Http\Controllers\YearController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::get('users/pass/{user_id}/edit', [App\Http\Controllers\UserController::class, 'passEdit']);
    Route::post('users/pass/{user_id}/store', [App\Http\Controllers\UserController::class, 'passStore'])->name('pass.store');
    
    Route::get('users/{type}/redirect', [App\Http\Controllers\UserController::class, 'redirectUserEdit']);
    Route::get('users/{user_id}/edit/{type}', [App\Http\Controllers\UserController::class, 'edit']);
    
    Route::get('users/{type}/redirect-pass', [App\Http\Controllers\UserController::class, 'redirectPasswordEdit']);
    Route::get('users/pass/{user_id}/edit/{type}', [App\Http\Controllers\UserController::class, 'passEdit']);

    
    Route::resource('archivos', App\Http\Controllers\FileController::class);
    Route::get('archivos/search/execute', [App\Http\Controllers\FileController::class, 'searchFile']);
    Route::get('archivos/export/execute', [App\Http\Controllers\FileController::class, 'exporFiles']);
    
    Route::post('archivos/export/select', [App\Http\Controllers\FileController::class, 'exporSelectFiles']);
    Route::post('archivos/export/send-email', [App\Http\Controllers\FileController::class, 'sendSelectFiles']);
    Route::get('archivos/{email_id}/download/selected', [App\Http\Controllers\FileController::class, 'downloadSelect']);
});
