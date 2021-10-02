<?php

use App\Http\Controllers\Admin\GovernorateController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
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



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('governorate', GovernorateController::class);
Route::resource('client', ClientController::class);
Route::get('client/status/{id}', [ClientController::class,'status']);
Route::resource('client', ClientController::class);
Route::resource('category', CategoryController::class);
Route::resource('city', CityController::class);
