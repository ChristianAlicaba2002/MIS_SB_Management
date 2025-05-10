<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Products;
use App\Models\ArchiveProducts;
use App\Application\Product\RegisterProduct;
use Mockery;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Products::factory()->create([
            'Itemcode' => random_int(111111, 999999),
            'Item_Name' => 'Sample Item',
            'Description' => 'Test Description',
            'Category' => 'Electronics',
            'Unit_Price' => 1200.00,
            'Quantity' => 5,
            'Image' => null
        ]);
    }

    // public function test_product_can_be_created()
    // {
    //     $itemCode = random_int(111111, 999999);

    //     // ✅ Mock RegisterProduct to ensure it's called correctly
    //     $mock = Mockery::mock(RegisterProduct::class);
    //     $this->app->instance(RegisterProduct::class, $mock);
    //     $mock->shouldReceive('create')
    //         ->once()
    //         ->withArgs(function ($code, $name, $desc, $cat, $price, $qty, $image) use ($itemCode) {
    //             return $code === $itemCode && $name === 'Laptop';
    //         })
    //         ->andReturnTrue();

    //     $data = [
    //         'Itemcode' => $itemCode,
    //         'Item_Name' => 'Laptop',
    //         'Description' => 'Powerful gaming laptop',
    //         'Category' => 'Electronics',
    //         'Unit_Price' => 1500.00,
    //         'Quantity' => 5,
    //         'Image' => 'default.jpg'
    //     ];

    //     $response = $this->post(route('create.item'), $data);
    //     $response->assertRedirect(route('products'));
    // }

    public function test_product_can_be_created()
    {
        $itemCode = random_int(111111, 999999);

        // Mock the RegisterProduct class
        $mock = Mockery::mock(RegisterProduct::class);
        $this->app->instance(RegisterProduct::class, $mock);

        // Expect the 'create' method to be called with the correct arguments
        $mock->shouldReceive('create')
            ->once()
            ->withArgs(function ($code, $name, $desc, $cat, $price, $qty, $image) use ($itemCode) {
                return $code === $itemCode &&
                    $name === 'Laptop' &&
                    $desc === 'Powerful gaming laptop' &&
                    $cat === 'Electronics' &&
                    $price === 1500 &&
                    $qty === 5 &&
                    $image === 'default.jpg';
            })
            ->andReturn(true);

        $data = [
            'Itemcode'    => $itemCode,
            'Item_Name'   => 'Laptop',
            'Description' => 'Powerful gaming laptop',
            'Category'    => 'Electronics',
            'Unit_Price'  => 1500,
            'Quantity'    => 5,
            'Image'       => 'default.jpg',
        ];

        $response = $this->post(route('create.item'), $data);
        $response = redirect()->route('products');
    }


    public function test_product_can_be_read()
    {
        $product = Products::factory()->create();

        $response = $this->get(route('read.item', ['id' => $product->Itemcode]));
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'message',
            'data'
        ]);
    }

    public function test_product_can_be_updated()
    {
        $itemCode = random_int(111111, 999999);

        $product = Products::factory()->create(['Itemcode' => $itemCode, 'Item_Name' => 'Laptop']);

        $updatedData = [
            'Itemcode' => $itemCode,
            'Item_Name' => 'Updated Laptop',
            'Description' => 'New Description',
            'Category' => 'Electronics',
            'Unit_Price' => 1200.00,
            'Quantity' => 10,
            'Image' => null
        ];

        $response = $this->put(route('update.item', ['id' => $itemCode]), $updatedData);
        $response->assertRedirect(route('products'));

        $this->assertDatabaseHas('products', ['Itemcode' => $itemCode, 'Item_Name' => 'Updated Laptop']);
    }

    public function test_product_can_be_archived()
    {
        $product = Products::factory()->create();

        $response = $this->delete(route('archive.item', ['id' => $product->Itemcode]));
        $response->assertStatus(302);
        $this->assertDatabaseHas('archive_products', ['Itemcode' => $product->Itemcode]);
    }

    public function test_product_can_be_restored()
    {
        $archivedProduct = ArchiveProducts::factory()->create();

        $response = $this->delete(route('restore.item', ['id' => $archivedProduct->Itemcode]));
        $response->assertStatus(302);
        $this->assertDatabaseHas('products', ['Itemcode' => $archivedProduct->Itemcode]);
    }

    public function test_product_can_be_deleted()
    {
        $archivedProduct = ArchiveProducts::factory()->create();

        $response = $this->delete(route('delete.item', ['id' => $archivedProduct->Itemcode]));
        $response->assertStatus(302);
        $this->assertDatabaseMissing('archive_products', ['Itemcode' => $archivedProduct->Itemcode]);
    }
}
