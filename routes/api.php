<?php

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


// Route::get('/state', [apiStateController::class, 'index'])->name('api.state');

Route::get('property/bystateid/{state}', [App\Http\Controllers\Api\apiPropertyController::class, 'bystateid'])->name('api.state.bystateid');

// for admin
Route::name('api.')->group(function () {
    
    
    Route::resources([
        'state' => App\Http\Controllers\Api\apiStateController::class,
        // 'location' => adminLocationController::class,
        // 'category' => adminCategoryController::class,
        // 'amenity' => adminAmenityController::class,
        // 'feature' => adminFeatureController::class,
        'property' => App\Http\Controllers\Api\apiPropertyController::class,
        // 'blogpost' => adminBlogPostController::class,
    ]);
    
});
