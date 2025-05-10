<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory;

  protected $table = 'Orders';
  protected $primaryKey = 'id';
  protected $fillable = [
    'productID',
    'productName',
    'productCategory',
    'productPrice',
    'quantity',
    'total_price',
    'productImage',
    'productDate',
  ];

  public function products()
  {
    return $this->belongsTo(Products::class, 'productID', 'Itemcode');
  }
}
