<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataImportLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'module',
        'source_name',
        'total_rows',
        'imported_rows',
        'failed_rows',
        'status',
        'error_log',
    ];

    protected $casts = [
        'error_log' => 'array',
    ];
}
