<?php

namespace App\Application\Product;

use App\Domain\Product\Product;
use App\Models\Products;
use App\Domain\Product\ProductRepository;
use App\Models\ArchiveProducts;

class RegisterProduct
{

    public function __construct(private ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function create(
        int $Itemcode,
        string $Item_Name,
        string $Description,
        string $Category,
        float $Unit_Price,
        int $Quantity,
        string $Image
    ) {
        $item = new Product(
            $Itemcode,
            $Item_Name,
            $Description,
            $Category,
            $Unit_Price,
            $Quantity,
            $Image
        );

        return $this->productRepository->create($item);
    }

    public function read(int $Itemcode)
    {
        $id = Products::where('Itemcode', $Itemcode)->first();

        return $this->productRepository->read($id);
    }

    public function update(
        int $Itemcode,
        string $Item_Name,
        string $Description,
        string $Category,
        float $Unit_Price,
        int $Quantity,
        string $Image
    ) {

        $updateItem = new Product(
            $Itemcode,
            $Item_Name,
            $Description,
            $Category,
            $Unit_Price,
            $Quantity,
            $Image
        );

        return $this->productRepository->update($updateItem);
    }

    public function delete(int $Itemcode)
    {
        return $this->productRepository->delete($Itemcode);
    }

    public function findById(int $Itemcode): ?Product
    {
        return $this->productRepository->findById($Itemcode);
    }

}
