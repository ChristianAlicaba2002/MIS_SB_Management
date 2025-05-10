<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArchiveProducts extends Model
{
    use HasFactory;
    protected $table = 'archive_products';
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
