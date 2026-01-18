<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DsaVariable extends Model
{
    use HasFactory;

    protected $fillable = [
        'variable_code',
        'description',
        'category',
    ];
    //
}
