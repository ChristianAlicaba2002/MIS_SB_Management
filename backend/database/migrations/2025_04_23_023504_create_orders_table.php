<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('ordercode');
            $table->foreignId('productID')->references('Itemcode')->on('products')->onDelete('cascade');
            $table->string('productName')->references('Item_name')->on('products');
            $table->string('productCategory')->references('Category')->on('products');
            $table->decimal('productPrice', 10, 2)->references('Unit_Price')->on('products');
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2);
            $table->string('productImage')->references('Image')->on('products');
            $table->date('productDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
