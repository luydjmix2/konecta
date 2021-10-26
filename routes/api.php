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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [\App\Http\Controllers\Users\UserController::class, 'register']);
Route::post('login', [\App\Http\Controllers\Users\UserController::class, 'authenticate']);


Route::group(['middleware' => ['jwt.verify']], function () {

    Route::post('user', [\App\Http\Controllers\Users\UserController::class, 'getAuthenticatedUser']);
    Route::post('user/update', [\App\Http\Controllers\Users\UserController::class, 'updateProfile']);
    Route::post('user/find', [\App\Http\Controllers\Users\UserController::class, 'findUser']);
    Route::post('user/find/all', [\App\Http\Controllers\Users\UserController::class, 'findAllUser']);
});
