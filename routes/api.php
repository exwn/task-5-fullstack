<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::post('/post', [PostController::class, 'login']);

Route::prefix('v1')->group(function () {
    Route::post('/register', [AuthController::class, 'apiRegister']);
    Route::post('/login', [AuthController::class, 'apiLogin']);

    Route::middleware('auth:api')->group(function () {
        Route::get('/post', [PostController::class, 'index']);
        Route::post('/post', [PostController::class, 'store']);
        Route::get('/post/{id}', [PostController::class, 'show']);
        Route::put('/post/{id}', [PostController::class, 'update']);
        Route::delete('/post/{id}', [PostController::class, 'destroy']);


        Route::get('/category', [CategoryController::class, 'index']);
        Route::post('/category', [CategoryController::class, 'store']);
        Route::get('/category/{id}', [CategoryController::class, 'show']);
        Route::put('/category/{id}', [CategoryController::class, 'update']);
        Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

        Route::get('/users', [UserController::class, 'index']);
    });
});
