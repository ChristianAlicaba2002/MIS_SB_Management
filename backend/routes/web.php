<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\Products\ProductsController;


Route::get('/', function () {
    if(Auth::guard('admin')->check())
    {
        return redirect()->route('dashboard');
    }
    return view('Admin.Auth.Login');
})->name('login')->middleware(PreventBackHistory::class);


Route::middleware(['auth:admin'])->group( function() {
    Route::get('/dashboard', function() {
        return view('Admin.Layouts.Dashboard');
    })->name('dashboard')->middleware(PreventBackHistory::class); 
});


//Product Routes
Route::post('/create', [ProductsController::class , 'create']);
Route::get('/products/{id}' , [ProductsController::class , 'read']);
Route::put('/products/{id}',[ProductsController::class, 'update']);
Route::delete('/archive/products/{id}' , [ProductsController::class , 'archive']);
Route::delete('/restore/products/{id}' , [ProductsController::class , 'restore']);
Route::delete('/delete/products/{id}' , [ProductsController::class , 'delete']);


//Admin Routes
Route::post('/login/admin', [AdminController::class , 'login'])->name('login.admin');
Route::post('/logout/admin', [AdminController::class , 'logout'])->name('logout.admin');