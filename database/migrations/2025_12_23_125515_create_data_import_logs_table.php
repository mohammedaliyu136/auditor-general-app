<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_import_logs', function (Blueprint $table) {
            $table->id();
            $table->string('module', 50);
            $table->string('source_name', 255);
            $table->integer('total_rows');
            $table->integer('imported_rows');
            $table->integer('failed_rows');
            $table->string('status', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_import_logs');
    }
};
