<?php

use App\Http\Controllers\Api\MagazineController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('getproducts', [ProductController::class, 'getproducts']);
Route::get('getproduct/{id}', [ProductController::class, 'getproduct']);
Route::put('updateproduct/{id}', [ProductController::class, 'updateproduct']);
Route::delete('destroyproduct/{id}', [ProductController::class, 'destroy']);
Route::post('addproduct', [ProductController::class, 'store']);
//Route::put()


Route::get('magazine/all', [MagazineController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
