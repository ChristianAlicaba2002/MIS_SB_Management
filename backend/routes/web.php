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

        $bestSellingProducts = DB::table('orders')
            ->select('productName', DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('productName')
            ->orderBy('total_quantity', 'desc')
            ->limit(5)
            ->get();

        return view('Admin.Layouts.Dashboard' ,compact('bestSellingProducts'));
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

    Route::get('/expensesPage', function () {
        $expenses = DB::table('expenses')->orderBy('created_at', 'desc')->get();
        return view('Admin.Pages.Expenses', compact('expenses'));
    })->name('expensesPage')->middleware(PreventBackHistory::class);
    Route::get('/expensesArchive', function () {
        $archive_expenses = DB::table('archive_expenses')->orderBy('created_at', 'desc')->get();
        return view('Admin.Pages.ArchiveExpenses', compact('archive_expenses'));
    })->name('expensesArchive')->middleware(PreventBackHistory::class);
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
Route::delete('/delete/order/{ordercode}', [OrdersController::class, 'DeleteOrder'])->name('delete.order');

// Expense Routes
Route::post('/addexpenses', [ExpenseController::class, 'store'])->name('add.expense');
Route::put('/expenses/update/{id}', [ExpenseController::class, 'update'])->name('update.expense');
Route::delete('/expenses/{id}/delete', [ExpenseController::class, 'destroy'])->name('delete.expense');
Route::delete('/expenses/{id}/restore', [ExpenseController::class, 'restore'])->name('restore.expense');
Route::delete('/expenses/{id}/archive', [ExpenseController::class, 'archive'])->name('archive.expense');
Route::get('/expenses', [ExpenseController::class, 'index'])->name('list.expenses');

//Inventory Routes
Route::post('/addinventory', [InventoryController::class, 'AddInventory'])->name('add.inventory');
Route::put('/updateinventory/{id}', [InventoryController::class, 'UpdateInventory'])->name('update.inventory');
Route::delete('/archiveinventory/{id}', [InventoryController::class, 'ArchiveInventory'])->name('archive.inventory');
Route::delete('/restoreinventory/{id}', [InventoryController::class, 'RestoreInventory'])->name('restore.inventory');
Route::delete('/deleteinventory/{id}', [InventoryController::class, 'DeleteInventory'])->name('delete.inventory');
