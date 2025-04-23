<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Products\ProductsController;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/create', [ProductsController::class , 'create']);
Route::get('/products/{id}' , [ProductsController::class , 'read']);
Route::put('/products/{id}',[ProductsController::class, 'update']);
Route::delete('/archive/products/{id}' , [ProductsController::class , 'archive']);
Route::delete('/restore/products/{id}' , [ProductsController::class , 'restore']);
Route::delete('/delete/products/{id}' , [ProductsController::class , 'delete']);