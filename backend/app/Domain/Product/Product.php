<?php

namespace App\Domain\Product;

class Product
{
    public function __construct(
        private int $Itemcode,
        private string $Item_Name,
        private string $Description,
        private string $Category,
        private float $Unit_Price,
        private int $Quantity,
        private string $Image,
    )
    {
        $this->Itemcode = $Itemcode;
        $this->Item_Name = $Item_Name;
        $this->Description = $Description;
        $this->Category = $Category;
        $this->Unit_Price = $Unit_Price;
        $this->Quantity = $Quantity;
        $this->Image = $Image;
    }

    public function getItemCode():int
    {
        return $this->Itemcode;
    }

    public function getItemName():string
    {
        return $this->Item_Name;
    }

    public function getDescription():string
    {
        return $this->Description;
    }

    public function getCategory():string
    {
        return $this->Category;
    }

    public function getUnitPrice():float
    {
        return $this->Unit_Price;
    }

    public function getQuantity():int
    {
        return $this->Quantity;
    }

    public function getImage():string
    {
        return $this->Image;
    }

}