<?php

use App\Http\Controllers\Web\Admin\ProductController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->as('admin.')->group(function() {
    Route::resource('products', ProductController::class)
        ->only(['index', 'create', 'store']);
});