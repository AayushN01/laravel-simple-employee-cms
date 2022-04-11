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

Route::get('login',[App\Http\Controllers\Auth\LoginController::class,'adminLogin'])->name('login');
Route::post('login',[App\Http\Controllers\Auth\LoginController::class,'login']);
Route::post('logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');


// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
