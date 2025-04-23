<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'Orders';
    protected $primaryKey = 'id';
    protected $fillable = [
      'product_id',
      'total_price'
    ];

    public function products(){
        return $this->belongsTo(Products::class, 'product_id', 'Itemcode');
    }
}
