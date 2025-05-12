<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Orders;
use App\Models\Products;
use App\Domain\Product\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_can_be_created()
    {
        $product = Products::factory()->create([
            'Itemcode' => random_int(111111, 999999),
            'Item_Name' => 'Gaming Laptop',
            'Category' => 'Electronics',
            'Unit_Price' => 2000.00,
            'Quantity' => 10,
            'Image' => 'laptop.jpg'
        ]);

        $data = [
            'productID' => $product->Itemcode,
            'productName' => $product->Item_Name,
            'productCategory' => $product->Category,
            'productPrice' => $product->Unit_Price,
            'quantity' => 2,
            'total_price' => 2 * $product->Unit_Price,
            'productImage' => $product->Image,
            'productDate' => now()->format('Y-m-d'),
        ];

        $response = $this->post(route('create.order'), $data);
        $response->assertRedirect(route('orders'));
    }

    public function test_order_can_be_deleted()
    {
        $order = Orders::factory()->create([
            'ordercode' => 1,
            'productID' => random_int(111111, 999999),
            'productName' => 'Gaming Laptop',
            'productCategory' => 'Electronics',
            'productPrice' => 2000.00,
            'quantity' => 2,
            'total_price' => 2 * 2000.00,
            'productImage' => 'laptop.jpg',
            'productDate' => '2023-10-01',
        ]);

        // Ensure the order exists in the database
        $this->assertDatabaseHas('Orders', [
            'ordercode' => $order->ordercode,
            'productID' => $order->productID,
            'productName' => $order->productName,
            'productCategory' => $order->productCategory,
            'productPrice' => $order->productPrice,
            'quantity' => $order->quantity,
            'total_price' => $order->total_price,
            'productImage' => $order->productImage,
            'productDate' => $order->productDate,
        ]);
        // Delete the order

        $response = $this->delete(route('delete.order', ['ordercode',$order->ordercode]));

        $response->assertRedirect(route('orders'));

    }
}
