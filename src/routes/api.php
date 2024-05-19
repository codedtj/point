<?php

use Core\Infrastructure\Http\Controllers\API\Category\CategoryController;
use Core\Infrastructure\Http\Controllers\API\Category\CategoryItemController;
use Core\Infrastructure\Http\Controllers\API\Checkout\BasketController;
use Core\Infrastructure\Http\Controllers\API\Checkout\BasketItemController;
use Core\Infrastructure\Http\Controllers\API\Checkout\OrderController;
use Core\Infrastructure\Http\Controllers\API\Item\ItemController;
use Core\Infrastructure\Http\Controllers\API\Point\PointController;
use Core\Infrastructure\Http\Controllers\API\Point\PointStockBalanceController;
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

Route::resource(
    'points.stock-balances',
    PointStockBalanceController::class
)->only(['index']);

Route::resource(
    'points',
    PointController::class
)->only(['index']);

Route::resource(
    'categories',
    CategoryController::class
)->only(['index']);


Route::resource(
    'categories.items',
    CategoryItemController::class
)->only(['index']);

Route::resource(
    'baskets.items',
    BasketItemController::class
)->only(['index', 'store', 'update', 'destroy']);

Route::resource(
    'baskets',
    BasketController::class
)->only(['index', 'show', 'store']);

Route::resource(
    'orders',
    OrderController::class
)->only(['show', 'store']);

Route::resource('items', ItemController::class)->only(['show']);
