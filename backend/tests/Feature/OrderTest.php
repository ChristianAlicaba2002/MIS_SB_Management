<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Orders;
use App\Models\Products;

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
            'productDate' => now()->format('Y-m-d'),
            'quantity' => 2
        ];

        $response = $this->post(route('create.order'), $data);
        $response->assertRedirect(route('orders'));

        // 🔥 Ensure the order is correctly inserted
        $this->assertDatabaseHas('orders', [
            'productID' => $product->Itemcode,
            'productName' => 'Gaming Laptop',
            'productCategory' => 'Electronics',
            'productPrice' => 2000.00,
            'quantity' => 2,
            'total_price' => 4000.00
        ]);
    }

    public function test_order_can_be_deleted()
    {
        // ✅ Create an order first
        $order = Orders::factory()->create([
            'productID' => random_int(111111, 999999),
            'productName' => 'Wireless Headphones',
            'productCategory' => 'Audio',
            'productPrice' => 150.00,
            'productDate' => now()->format('Y-m-d'),
            'quantity' => 1,
            'total_price' => 150.00
        ]);

        $response = $this->delete(route('delete.order', ['id' => $order->id])); // ✅ Fixing primary key issue
        $response->assertRedirect(route('orders'));

        // 🔥 Ensure the order is removed from the database
        $this->assertDatabaseMissing('orders', ['id' => $order->id]); // ✅ Fixing primary key issue
    }
}
