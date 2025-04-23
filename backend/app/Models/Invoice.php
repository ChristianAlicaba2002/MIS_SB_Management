<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'Invoice';
    protected $primaryKey = 'invoice_number';
    protected $fillable = [
        'order_id',
        'total_amount'
    ];

    public function orders(){
        return $this->belongsTo(Orders::class, order_id);
    }
}
