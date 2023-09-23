<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;

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
});


Route::post('auth/login', [AuthController::class, 'login']);
