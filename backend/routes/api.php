<?php

use App\Http\Controllers\Products\ProductsController;
use App\Http\Controllers\Expenses\ExpenseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products', [ProductsController::class , 'Products']);

Route::get('/storage/{imageName}', function ($imageName) {
    return response()->file(public_path('/images/' . $imageName));
});

Route::post('/addexpenses', [ExpenseController::class, 'store']);
Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy']);
Route::post('/expenses/{id}/restore', [ExpenseController::class, 'restore']);
Route::get('/expenses', [ExpenseController::class, 'index']);
