<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLineItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'line_item_code',
        'line_item_description',
    ];

    //
}
