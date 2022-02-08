<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Admin\ProductController;
use App\Http\Controllers\Web\Admin\PurchaseController;


Route::prefix('admin')->as('admin.')->group(function () {
    Route::resource('products', ProductController::class)
        ->only(['index', 'create', 'store']);

    Route::resource('purchases', PurchaseController::class)
        ->only(['index']);
});
