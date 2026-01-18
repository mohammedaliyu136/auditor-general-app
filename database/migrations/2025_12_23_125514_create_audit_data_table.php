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
        Schema::create('audit_data', function (Blueprint $table) {
            $table->id();
            $table->integer('fiscal_year')->index();
            $table->string('state', 100)->index();
            $table->string('statement_type', 100);
            $table->string('line_item_code', 100)->index();
            $table->string('line_item_description', 255);
            $table->string('fund', 100)->nullable();
            $table->decimal('amount', 20, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_data');
    }
};
