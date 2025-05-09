<?php

namespace App\Http\Controllers\Orders;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    public function CreateOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'productID' => 'required|string',
        'productName' => 'required|string',
        'productCategory' => 'required|string',
        'productPrice' => 'required|numeric',
        'productDate' => 'required|date_format:Y-m-d',
        'quantity' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->route('orders')->with('error', $validator->errors());
        }

        // Check if the product is already ordered
        $existingOrder = DB::table('products')->where('Itemcode', $request->productID)->first();

        $ordered = Orders::create([
            'productID' => $request->productID,
            'productName' => $request->productName,
            'productCategory' => $request->productCategory,
            'productPrice' => $request->productPrice,
            'productDate' => $request->productDate,
            'quantity' => $request->quantity,
            'total_price' => $request->productPrice * $request->quantity,
            'productImage' => $existingOrder->Image,
        ]);
        
        return redirect()->route('orders')->with('success', 'Order created successfully');
    }

    public function DeleteOrder($ordercode)
    {
        $order = DB::table('orders')->where('ordercode', $ordercode)->first();
        if (!$order) {
            return redirect()->route('orders')->with('error', 'Order not found');
        }

        DB::table('orders')->where('ordercode', $order->ordercode)->delete();
        return redirect()->route('orders')->with('success', 'Order deleted successfully');
    }
}
