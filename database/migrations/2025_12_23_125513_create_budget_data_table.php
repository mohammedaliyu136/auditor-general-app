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
        Schema::create('budget_data', function (Blueprint $table) {
            $table->id();
            $table->integer('fiscal_year')->index();
            $table->string('ministry', 150)->index();
            $table->string('economic_code', 50);
            $table->string('description', 255);
            $table->decimal('amount', 20, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_data');
    }
};
