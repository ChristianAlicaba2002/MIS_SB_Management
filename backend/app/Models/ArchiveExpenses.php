<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveExpenses extends Model
{


    protected $table = 'archive_expenses';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'expense_id',
        'name',
        'amount',
        'datetime',
        'category',
    ];
}
