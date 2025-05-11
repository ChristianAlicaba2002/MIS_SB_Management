<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory;

    protected $table = "expenses";
    protected $primary_key = 'id';
    protected $fillable = [
        'name',
        'amount',
        'datetime',
        'category'
    ];
}
