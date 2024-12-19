<?php

use App\Http\Controllers\Api\V3\CategoryController;
use App\Http\Controllers\Api\V3\ProductController;
use App\Http\Controllers\Api\V3\SubCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('lists/categories', [CategoryController::class,  'list']);

Route::get('/subcategories', [SubCategoryController::class,  'index']);

Route::post('/subcategories', [SubCategoryController::class,  'store']);

Route::put('/subcategories/{subcategory}', [SubCategoryController::class,  'update']);

Route::delete('/subcategories/{subcategory}', [SubCategoryController::class,  'destroy']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('categories', CategoryController::class);

    Route::get('products', [ProductController::class,  'index'])
        ->middleware('throttle:products');
});
