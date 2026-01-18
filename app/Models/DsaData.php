<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DsaData extends Model
{
    use HasFactory;

    protected $fillable = [
        'fiscal_year',
        'state',
        'variable_type',
        'variable_code',
        'description',
        'value',
    ];
}
