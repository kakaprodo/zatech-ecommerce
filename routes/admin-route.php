<?php

use App\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Admin\ProductController;
use App\Http\Controllers\Web\Admin\DiscountController;
use App\Http\Controllers\Web\Admin\PurchaseController;


Route::prefix('admin')->as('admin.')->group(function () {
    Route::resource('products', ProductController::class);

    Route::resource('purchases', PurchaseController::class)
        ->only(['index']);

    Route::resource('discounts', DiscountController::class)
        ->only(['index']);
});
