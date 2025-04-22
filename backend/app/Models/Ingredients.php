<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    protected $table = 'Ingredients';
    protected $primaryKey = 'Ingredient_code';
    protected $fillable = [
        'Ingredient_name',
        'quantity',
        'unit'
    ];
}
