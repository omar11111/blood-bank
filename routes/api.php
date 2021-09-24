<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\BloodTypeController;
use App\Http\Controllers\Api\CategoryNameController;
use App\Http\Controllers\Api\CityController;

use App\Http\Controllers\Api\GovernorateController;
use App\Http\Controllers\Api\SettingController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'v1','namespace'=>'api'],function(){

    // Get all data
    Route::get('governorates', [GovernorateController::class,'index']);

    Route::get('cities', [CityController::class,'index']);

    Route::get('settings', [SettingController::class,'index']);

    Route::get('contacts',  [ContactController::class,'index']);

    Route::get('categories',  [CategoryNameController::class,'index']);

    Route::get('blood_types',  [BloodTypeController::class,'index']);

    // authentcation
    Route::post('signup',[AuthController::class,'register']);
    Route::post('signin',[AuthController::class,'login']);
    Route::get('forget-password',[AuthController::class,'forgetPassword'] ) ;
});
