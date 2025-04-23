<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'Sales';
    protected $primaryKey = 'id';
    protected $fillable = [
        'order_id',
        'quantity_sold',
        'total_price',
    ];

    public function products(){
        return $this->belongsTo(Products::class, 'order_id', 'ordercode');
    }

}
