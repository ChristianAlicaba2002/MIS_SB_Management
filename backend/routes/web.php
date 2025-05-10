<?php

use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Orders\OrdersController;
use App\Http\Controllers\Expenses\ExpenseController;
use App\Http\Controllers\Products\ProductsController;
use App\Http\Controllers\Inventory\InventoryController;

Route::get('/', function () {
    if (Auth::guard('admin')->check()) {
        return redirect()->route('dashboard');
    }
    return view('Admin.Auth.Login');
})->name('login')->middleware(PreventBackHistory::class);


Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', function () {
        // Get best selling products
        $bestSellers = DB::table('orders')
            ->select('productName', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('productName')
            ->orderBy('total_sold', 'desc')
            ->limit(5)
            ->get();

        // Get sales summary
        $totalSales = DB::table('orders')->sum('total_price');

        // Get sales for today
        $todaySales = DB::table('orders')
            ->whereDate('created_at', now()->toDateString())
            ->sum('total_price');
            
        // Get order received
        $orderReceived = DB::table('orders')
            ->select(DB::raw('COUNT(*) as total'))
            ->whereDate('created_at', now()->toDateString())
            ->first()->total;
        // Get today's orders
        $todayOrders = DB::table('orders')
            ->select(DB::raw('COUNT(*) as total'))
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->first()->total;

            // Get sales summary for each product category
            $salesSummary = DB::table('orders')
                ->select('productCategory', 
                    DB::raw('COUNT(*) as order_count'),
                    DB::raw('SUM(quantity) as total_quantity'),
                    DB::raw('SUM(total_price) as total_sales'))
                ->groupBy('productCategory')
                ->get();

            // Add to compact array
            return view('Admin.Layouts.Dashboard', compact('bestSellers', 'totalSales', 'todaySales', 'orderReceived', 'todayOrders', 'salesSummary'));

        return view('Admin.Layouts.Dashboard', compact('bestSellers', 'totalSales', 'todaySales', 'orderReceived', 'todayOrders'));
    })->name('dashboard')->middleware(PreventBackHistory::class);
    Route::get('/products', function () {
        $products = Products::all();
        $categories = DB::table('products')->pluck('Category')->unique();
        return view('Admin.Pages.Products', compact('products', 'categories'));
    })->name('products')->middleware(PreventBackHistory::class);
    Route::get('/archive-products', function () {
        $archive_products = DB::table('archive_products')->get();
        return view('Admin.Pages.ArchiveProducts', compact('archive_products'));
    })->name('archive-products')->middleware(PreventBackHistory::class);
    Route::get('/orders', function () {
        $orders = DB::table('orders')->get();
        $countAllOrders = DB::table('orders')->count();
        return view('Admin.Pages.Orders', compact('orders', 'countAllOrders'));
    })->name('orders')->middleware(PreventBackHistory::class);
    Route::get(
        '/receipt/{ordercode}/{productID}/{productName}/{productCategory}/{productPrice}/{productDate}/{quantity}/{total_price}',
        function ($ordercode, $productID, $productName, $productCategory, $productPrice, $productDate, $quantity, $total_price) {
            return view('Admin.Pages.Receipt', [
                'ordercode' => $ordercode,
                'productID' => $productID,
                'productName' => $productName,
                'productCategory' => $productCategory,
                'productPrice' => $productPrice,
                'productDate' => $productDate,
                'quantity' => $quantity,
                'total_price' => $total_price

            ]);
        }
    )->name('receipt')->middleware(PreventBackHistory::class);
    Route::get('/inventory', function () {
        $inventories = DB::table('inventories')->get();
        return view('Admin.Pages.Inventory', compact('inventories'));
    })->name('inventory')->middleware(PreventBackHistory::class);
    Route::get('/archiveinventory', function () {
        $archive_inventories = DB::table('archive_inventories')->get();
        return view('Admin.Pages.ArchiveInventory', compact('archive_inventories'));
    })->name('archiveinventory')->middleware(PreventBackHistory::class);
    Route::get('/editinventory', function () {
        return view('Admin.Pages.EditInventory');
    })->name('editinventory')->middleware(PreventBackHistory::class);
    Route::get('/sales', function () {

        // Get monthly sales data
        $monthlySales = DB::table('orders')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(total_price) as total'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // // Get monthly order count
        // $monthlyOrders = DB::table('orders')
        //     ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
        //     ->groupBy('month')
        //     ->orderBy('month')
        //     ->get();

        // Get sales by category
        $salesByCategory = DB::table('orders')
            ->select('productCategory', DB::raw('SUM(total_price) as total'))
            ->groupBy('productCategory')
            ->orderBy('total', 'desc')
            ->get();

        // Pass all variables to the view
        return view('Admin.Pages.Sales', compact(
            'monthlySales',
            // 'monthlyOrders',
            'salesByCategory'
        ));
        // return view('Admin.Pages.Sales');
    })->name('sales')->middleware(PreventBackHistory::class);
});


//Product Routes
Route::post('/create.item', [ProductsController::class, 'create'])->name('create.item');
Route::get('/products/{id}', [ProductsController::class, 'read'])->name('read.item');
Route::put('/update/products/{id}', [ProductsController::class, 'update'])->name('update.item');
Route::delete('/archive/products/{id}', [ProductsController::class, 'archive'])->name('archive.item');
Route::delete('/restore/products/{id}', [ProductsController::class, 'restore'])->name('restore.item');
Route::delete('/delete/products/{id}', [ProductsController::class, 'delete'])->name('delete.item');

//Admin Routes
Route::post('/login/admin', [AdminController::class, 'login'])->name('login.admin');
Route::post('/logout/admin', [AdminController::class, 'logout'])->name('logout.admin');

//Order Routes
Route::post('/create/order', [OrdersController::class, 'CreateOrder'])->name('create.order');
Route::delete('/delete/order/{id}', [OrdersController::class, 'DeleteOrder'])->name('delete.order');

// Expense Routes
Route::post('/addexpenses', [ExpenseController::class, 'store'])->name('add.expense');
Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy'])->name('delete.expense');
Route::post('/expenses/{id}/restore', [ExpenseController::class, 'restore'])->name('restore.expense');
Route::get('/expenses', [ExpenseController::class, 'index'])->name('list.expenses');

//Inventory Routes
Route::post('/addinventory', [InventoryController::class, 'AddInventory'])->name('add.inventory');
Route::put('/updateinventory/{id}', [InventoryController::class, 'UpdateInventory'])->name('update.inventory');
Route::delete('/archiveinventory/{id}', [InventoryController::class, 'ArchiveInventory'])->name('archive.inventory');
Route::delete('/restoreinventory/{id}', [InventoryController::class, 'RestoreInventory'])->name('restore.inventory');
Route::delete('/deleteinventory/{id}', [InventoryController::class, 'DeleteInventory'])->name('delete.inventory');
