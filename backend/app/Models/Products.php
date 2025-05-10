<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'Itemcode';
    protected $fillable = [
        'Itemcode',
        'Item_Name',
        'Description',
        'Category',
        'Unit_Price',
        'Quantity',
        'Image'
    ];
}
