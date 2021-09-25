<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AreaController;

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
})->middleware('auth');

Route::get('/users', [UserController::class, 'show']);
Route::get('/user/form/{id?}', [UserController::class, 'form'])->name('user.form');
Route::post('/user/save', [UserController::class, 'save'])->name('user.save');
Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Areas


Route::get('/areas', [AreaController::class, 'show']);
Route::get('/area/form/{id?}', [AreaController::class, 'form'])->name('area.form');
Route::post('/area/save', [AreaController::class, 'save'])->name('area.save');
Route::get('/area/delete/{id}', [AreaController::class, 'delete'])->name('area.delete');
