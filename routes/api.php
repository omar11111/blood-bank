<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\BloodTypeController;
use App\Http\Controllers\Api\CategoryNameController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\DonationController;
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
    
   
 Route::middleware('auth:api')->group(function () {
     //posts and favourite posts
    Route::get('post',[PostController::class,'posts'] ) ;
    Route::post('create-favourite-posts',[PostController::class,'favouritePosts'] ) ;
    Route::post('add-favourite-posts',[PostController::class,'viewFavourite']);
    // get user data and view it to be edited 
    Route::post('profile',[AuthController::class,'profile'] ) ;

    //view and edite notification settings
    Route::post('notification-settinge',[AuthController::class,'notificationSettings'] ) ;

    //donation making and view donation and push notifications 
    Route::post('donation',[DonationController::class,'donations'] ) ;
    Route::post('make-donation',[DonationController::class,'donationRequestCreate'] ) ;
     
    
    
 });
 
    
});
