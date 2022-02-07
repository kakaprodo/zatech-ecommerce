<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Auth\Api\LoginController;
use App\Http\Controllers\Api\AccountBalanceController;
use App\Http\Controllers\Api\UserController;
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

Route::post('register', [RegisterUserController::class, 'store']);

Route::post('login', [LoginController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', [UserController::class, 'authUser']);

    Route::post('topup-account', [AccountBalanceController::class, 'topup']);

    Route::get('all-products', [ProductController::class, 'index']);
});
