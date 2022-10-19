<?php

use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\FoodController;
use App\Http\Controllers\api\v1\OrderController;
use App\Http\Controllers\api\v1\TableController;
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

Route::prefix('v1')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login');
        Route::middleware('auth:sanctum')->group(function () {
            Route::post('logout', 'logout');
        });
    });

    Route::apiResource('table', TableController::class)->except(['store', 'destroy']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('user-profile', fn () => auth()->user());
        Route::apiResource('order', OrderController::class)->except(['store', 'update', 'destroy']);
        Route::put('order/add', [OrderController::class, 'addOrderDetail']);
        Route::put('order/update', [OrderController::class, 'updateOrderDetail']);
        Route::delete('order/delete/{id}', [OrderController::class, 'deleteOrderDetail']);
        Route::post('order-table', [OrderController::class, 'orderTable']);
        Route::put('close-order', [OrderController::class, 'closeOrder']);
        Route::apiResource('food', FoodController::class);
        Route::get('food-order', [FoodController::class, 'indexFoodOrder']);
    });
});
