<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AuditData extends Model
{
    use HasFactory;

    protected $fillable = [
        'fiscal_year',
        'state',
        'statement_type',
        'line_item_code',
        'line_item_description',
        'fund',
        'amount',
    ];
    //
}
