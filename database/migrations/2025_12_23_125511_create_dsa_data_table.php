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
        Schema::create('dsa_data', function (Blueprint $table) {
            $table->id();
            $table->integer('fiscal_year')->index();
            $table->string('state', 100)->index();
            $table->string('variable_type', 100);
            $table->string('variable_code', 100)->index();
            $table->string('description', 255);
            $table->decimal('value', 20, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dsa_data');
    }
};
