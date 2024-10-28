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
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('color_name')->index(); // Added index for faster lookups by color name
            $table->string('hex_value', 7)->unique(); // HEX value should be unique
            $table->enum('status', ['active', 'inactive'])->default('active'); // Default status set to 'active'
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Simplified foreign key definition
            $table->timestamps();
            $table->softDeletes(); // Add soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colors');
    }
};
