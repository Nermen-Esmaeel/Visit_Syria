<?php

use app\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\ExploreController;
use App\Http\Resources\Api\HotelRatingResource;
use App\Http\Controllers\Api\Explore\HotelController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


    Route::post('/register', [AuthController::class, 'register']);
    

   


Route::prefix('Explore')->controller(ExploreController::class)->group(function(){

    Route::get('/Hotels','HotelsIndex');
    Route::get('/Restaurants','RestaurantsIndex');
    Route::get('/Tourist_Sites','SitesIndex');
    Route::post('/ShowSite','ShowSite');
    Route::post('/ShowHotel','ShowHotel');
    Route::post('/ShowRestaurant','ShowRestaurant');
    Route::post('/Search','Search');

    Route::middleware('auth:sanctum')->group(function(){

        Route::post('/iLikeThisHotel','iLikeThisHotel');
        Route::post('/iLikeThisRestaurant','iLikeThisRestaurant');
        Route::post('/iLikeThisSite','iLikeThisSite');
        Route::post('/AddCommentToHotel','AddCommentToHotel');
        Route::post('/AddCommentToRestaurant','AddCommentToRestaurant');
        Route::post('/AddCommentToSite','AddCommentToSite');

        Route::post('/Rating','Rating');
    });
    
});


