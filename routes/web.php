<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/list', [App\Http\Controllers\HomeController::class, 'list']);


Route::controller(App\Http\Controllers\AccountController::class)->prefix('accounts')->group(function () {
    Route::get('/', 'index');
    Route::get('create', 'createPage')->name('accounts.create');
    Route::post('save-account', 'create')->name('accounts.save-account');
    Route::get('edit/{id}', 'edit')->name('accounts.edit');
    Route::put('update/{id}', 'update');
    Route::get('delete/{id}', 'destroy');
});

Route::controller(App\Http\Controllers\ExpenseController::class)->prefix('expense')->group(function () {
    Route::get('/', 'index');
    Route::get('create', 'createPage')->name('accounts.create');
    Route::post('save-account', 'create')->name('accounts.save-account');
    Route::get('edit/{id}', 'edit')->name('accounts.edit');
    Route::put('update/{id}', 'update');
    Route::get('delete/{id}', 'destroy');
});
