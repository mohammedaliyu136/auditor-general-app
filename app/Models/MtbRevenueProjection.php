<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MtbRevenueProjection extends Model
{
    use HasFactory;

    protected $fillable = [
        'fiscal_year',
        'revenue_code',
        'description',
        'projected_amount',
    ];
    //
}
