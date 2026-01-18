<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetData extends Model
{
    use HasFactory;

    protected $fillable = [
        'fiscal_year',
        'ministry',
        'economic_code',
        'description',
        'amount',
    ];

    //
}
