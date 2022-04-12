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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::group(['prefix'=>'admin', 'middleware' => 'auth'], function(){
    Route::group(['as'=>'company.', 'prefix'=>'company'], function(){
        Route::get('/', [App\Http\Controllers\CompanyController::class,'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\CompanyController::class,'create'])->name('create');
        Route::post('', [App\Http\Controllers\CompanyController::class,'store'])->name('store');
        Route::get('/{id}/edit', [App\Http\Controllers\CompanyController::class,'edit'])->name('edit');
        Route::put('/{id}', [App\Http\Controllers\CompanyController::class,'update'])->name('update');
        Route::get('/{id}', [App\Http\Controllers\CompanyController::class,'destroy'])->name('delete');
    });

    Route::group(['as'=>'employee.', 'prefix'=>'employee'], function(){
        Route::get('/', [App\Http\Controllers\EmployeeController::class,'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\EmployeeController::class,'create'])->name('create');
        Route::post('/', [App\Http\Controllers\EmployeeController::class,'store'])->name('store');
        Route::get('show/{id}/', [App\Http\Controllers\EmployeeController::class,'show'])->name('show');
    }); 
});