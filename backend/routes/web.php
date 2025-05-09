<?php

use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Orders\OrdersController;
use App\Http\Controllers\Products\ProductsController;
use App\Http\Controllers\Expenses\ExpenseController;

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
    Route::get('/products', function() {
        $products = Products::all();
        $categories = DB::table('products')->pluck('Category')->unique();
        return view('Admin.Pages.Products',compact('products', 'categories'));
    })->name('products')->middleware(PreventBackHistory::class);
    Route::get('/archive-products', function() {
        $archive_products = DB::table('archive_products')->get();
        return view('Admin.Pages.ArchiveProducts', compact('archive_products'));
    })->name('archive-products')->middleware(PreventBackHistory::class);
    Route::get('/orders', function() {
        $orders = DB::table('orders')->get();
        $countAllOrders = DB::table('orders')->count();
        return view('Admin.Pages.Orders' , compact('orders','countAllOrders'));
    })->name('orders')->middleware(PreventBackHistory::class);
    Route::get('/receipt/{ordercode}/{productID}/{productName}/{productCategory}/{productPrice}/{productDate}/{quantity}/{total_price}',
        function($ordercode,$productID,$productName,$productCategory,$productPrice,$productDate,$quantity,$total_price) {
        return view('Admin.Pages.Receipt',[
            'ordercode' => $ordercode,
            'productID' => $productID,
            'productName' => $productName,
            'productCategory' => $productCategory,
            'productPrice' => $productPrice,
            'productDate' => $productDate,
            'quantity' => $quantity,
            'total_price' => $total_price

        ]);
    })->name('receipt')->middleware(PreventBackHistory::class);
});


//Product Routes
Route::post('/create.item', [ProductsController::class , 'create'])->name('create.item');
Route::get('/products/{id}' , [ProductsController::class , 'read'])->name('read.item');
Route::put('/update/products/{id}',[ProductsController::class, 'update'])->name('update.item');
Route::delete('/archive/products/{id}' , [ProductsController::class , 'archive'])->name('archive.item');
Route::delete('/restore/products/{id}' , [ProductsController::class , 'restore'])->name('restore.item');
Route::delete('/delete/products/{id}' , [ProductsController::class , 'delete'])->name('delete.item');

//Admin Routes
Route::post('/login/admin', [AdminController::class , 'login'])->name('login.admin');
Route::post('/logout/admin', [AdminController::class , 'logout'])->name('logout.admin');

//Order Routes
Route::post('/create/order', [OrdersController::class , 'CreateOrder'])->name('create.order');
Route::delete('/delete/order/{id}', [OrdersController::class , 'DeleteOrder'])->name('delete.order');

// Expense Routes
Route::post('/addexpenses', [ExpenseController::class, 'store'])->name('add.expense');
Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy'])->name('delete.expense');
Route::post('/expenses/{id}/restore', [ExpenseController::class, 'restore'])->name('restore.expense');
Route::get('/expenses', [ExpenseController::class, 'index'])->name('list.expenses');
