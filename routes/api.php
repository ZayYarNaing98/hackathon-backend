<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FeatureController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\SubscriptionController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CategoryController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::apiResource('/users', UserController::class);

    Route::get('/roles', [UserController::class, 'getRoleName']);
    Route::put('/users/{id}/status', [UserController::class, 'status']);
    Route::post('/users/{id}/image', [UserController::class, 'storeImageByUserId']);
    Route::get('/users/{id}/image', [UserController::class, 'getImageByUserId']);
    Route::delete('/users/{id}/image', [UserController::class, 'deleteImageByUserId']);
    Route::apiResource('/category', CategoryController::class);


    Route::apiResource('/features', FeatureController::class);
    Route::apiResource('/subscriptions', SubscriptionController::class);
    Route::apiResource('/profiles', ProfileController::class);

    Route::post('/profiles/{id}/banner', [ProfileController::class, 'storeImageByProfileId']);
    Route::get('/profiles/{id}/banner', [ProfileController::class, 'getImageByProfileId']);
    Route::delete('/profiles/{id}/banner', [ProfileController::class, 'deleteImageByProfileId']);
});


Route::post('auth/login', [AuthController::class, 'login']);
