<?php

namespace App\Infrastructure\Persistence\Eloquent\Product;

use App\Domain\Product\Product;
use App\Models\Products as ProductModel;
use App\Domain\Product\ProductRepository;
use App\Models\ArchiveProducts;

class EloquentProductRepository implements ProductRepository
{
    public function create(Product $product)
    {
        $ProductModel = ProductModel::find($product->getItemCode()) ?? new ProductModel(); 
        $ProductModel->Itemcode = $product->getItemCode();
        $ProductModel->Item_Name = $product->getItemName();
        $ProductModel->Description = $product->getDescription();
        $ProductModel->Category = $product->getCategory();
        $ProductModel->Unit_Price = $product->getUnitPrice();
        $ProductModel->Quantity = $product->getQuantity();
        $ProductModel->Image = $product->getImage();
        $ProductModel->save();
    }

    public function read(int $Itemcode)
    {
        $item = ProductModel::where('Itemcode' , $Itemcode)->first();

        return $item;
    }

    public function update(Product $product)
    {
        $ProductModel = ProductModel::find($product->getItemCode()) ?? new ProductModel(); 

        if ($ProductModel === null) {
            throw new \RuntimeException('Product not found');
        }

        $ProductModel->Itemcode = $product->getItemCode();
        $ProductModel->Item_Name = $product->getItemName();
        $ProductModel->Description = $product->getDescription();
        $ProductModel->Category = $product->getCategory();
        $ProductModel->Unit_Price = $product->getUnitPrice();
        $ProductModel->Quantity = $product->getQuantity();
        $ProductModel->Image = $product->getImage();
        $ProductModel->save();
    }

    public function delete(int $Itemcode)
    {
        $item = ProductModel::where('Itemcode' , $Itemcode)->first();

        if(!$item) return null;
        
        return $item->delete();
    }
    
    public function findById(int $Itemcode)
    {
        $id = ProductModel::find($Itemcode);
        if($id === null) return null;

        new Product(
            $id->Itemcode,
            $id->Item_Name,
            $id->Description,
            $id->Category,
            $id->Unit_Price,
            $id->Quantity,
            $id->Image
        );
    }


}