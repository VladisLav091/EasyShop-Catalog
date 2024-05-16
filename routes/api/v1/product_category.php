<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCategoryController;

Route::prefix('api/v1')->group(function () {
    Route::post('products/{productId}/categories', [ProductCategoryController::class, 'addCategoryToProduct']);
    Route::delete('products/{productId}/categories/{categoryId}', [ProductCategoryController::class, 'removeCategoryFromProduct']);
    Route::get('products/{productId}/categories', [ProductCategoryController::class, 'getProductCategories']);
    Route::get('categories/{categoryId}/products', [ProductCategoryController::class, 'getCategoryProducts']);
});
