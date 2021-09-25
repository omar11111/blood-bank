<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\BloodTypeController;
use App\Http\Controllers\Api\CategoryNameController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\GeneralApiController;

use App\Http\Controllers\Api\PostController;
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
    Route::get('governorates', [GeneralApiController::class,'governorates']);

    Route::get('cities', [GeneralApiController::class,'cities']);

    Route::get('settings', [GeneralApiController::class,'settings']);

    Route::get('contacts',  [GeneralApiController::class,'contacts']);

    Route::get('categories',  [GeneralApiController::class,'categories']);

    Route::get('blood_types',  [GeneralApiController::class,'bloodTypes']);

    // user process 
    Route::post('signup',[AuthController::class,'register']);
    Route::post('signin',[AuthController::class,'login']);
    Route::post('forget-password',[AuthController::class,'forgetPassword'] ) ;
    Route::post('create-new-password',[AuthController::class,'createNewPssword'] ) ;
    
    //posts
 Route::middleware('auth:api')->group(function () {
    Route::get('post',[PostController::class,'posts'] ) ;
    
 });
 
    
});
