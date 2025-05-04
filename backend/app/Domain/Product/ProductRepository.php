<?php

namespace App\Domain\Product;

interface ProductRepository
{
    public function create(Product $product);
    public function read(int $Itemcode);
    public function update(Product $product);
    public function delete(int $Itemcode);
    public function findById(int $Itemcode);
}