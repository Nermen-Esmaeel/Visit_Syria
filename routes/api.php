<?php

use app\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\ExploreController;
use App\Http\Controllers\Api\LandingController;
use App\Http\Resources\Api\HotelRatingResource;
use App\Http\Controllers\RecommendationController;
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
/*
Client ID
418315498212-qo2u4v57476ir3r03i9ibcdbvrh5b5p1.apps.googleusercontent.com

Client secret
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
*/

    Route::post('/register', [AuthController::class, 'register']);


    Route::get('login/google', [AuthController::class, 'redirectToGoogle']);
    Route::get('login/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');



    #########################/Explore SECTION /#########################

Route::prefix('Explore')->controller(ExploreController::class)->group(function(){

    Route::get('/Hotels','HotelsIndex');
    Route::get('/Restaurants','RestaurantsIndex');
    Route::get('/Tourist_Sites','SitesIndex');
    Route::get('/ShowSite/{id}','ShowSite');
    Route::get('/ShowHotel/{id}','ShowHotel');
    Route::get('/ShowRestaurant/{id}','ShowRestaurant');
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

    #########################/Landing page SECTION /#########################


Route::prefix('Landing')->controller(LandingController::class)->group(function(){

    Route::get('/','index');


});

    #########################/Landing page SECTION /#########################


    Route::prefix('Blog')->controller(BlogController::class)->group(function(){

        Route::get('/','index');
        Route::get('Article/{id}','Article');
    
    
    });

    #########################/About page SECTION /#########################
    Route::prefix('About')->controller(AboutController::class)->group(function(){

        Route::get('/{section}','index');

    });

    #########################/Recommendations SECTION /#########################

    Route::prefix('Recommendations')->controller(RecommendationController::class)->group(function(){

        Route::get('/Hotels','RecommendedHotels');
        Route::get('/Restaurants','RecommendedRestaurants');
        Route::post('/Sites','RecommendedSites');
        Route::get('/ShowHotel/{id}','ShowRecommendedHotel');
        Route::get('/ShowRestaurant/{id}','ShowRecommendedRestaurant');
        Route::get('/ShowSite/{id}','ShowRecommendedSite');


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

