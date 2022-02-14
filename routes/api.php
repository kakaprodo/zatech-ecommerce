<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\DiscountController;
use App\Http\Controllers\Api\PurchaseController;
use App\Http\Controllers\Auth\Api\LoginController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\AccountBalanceController;
use App\Http\Controllers\Auth\Api\RegisterUserController;

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

Route::post('register', [RegisterUserController::class, 'store'])
    ->name('register');

Route::post('login', [LoginController::class, 'login'])
    ->name('login');;


Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', [UserController::class, 'authUser']);

    Route::post('topup-account', [AccountBalanceController::class, 'topup'])
        ->name('topup.account');

    Route::get('user-transactions', [
        TransactionController::class,
        'userTransactions'
    ]);

    Route::apiResource('purchases', PurchaseController::class)
        ->only(['index', 'store']);
});

Route::resource('products', ProductController::class)
    ->only(['index', 'show']);

Route::resource('discounts', DiscountController::class)
    ->only(['index']);

Route::post('search-products', [ProductController::class, 'searchProduct']);
