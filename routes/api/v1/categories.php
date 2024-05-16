<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::prefix('api/v1')->group(function () {
    Route::apiResource('categories', CategoryController::class);
});
