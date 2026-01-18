<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MtbMacroAssumption extends Model
{
    use HasFactory;

    protected $fillable = [
        'fiscal_year',
        'variable',
        'description',
        'value',
    ];
    //
}
