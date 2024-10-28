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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name')->index(); // Indexed for quick lookup by brand name
            $table->string('url_slug')->unique(); // Unique slug, automatically indexed
            $table->string('img_path')->nullable(); // Nullable image path
            $table->text('description')->nullable(); // Optional description
            $table->enum('status', ['active', 'inactive'])->default('active'); // Default to 'active'
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Cascade delete for user relationship
            $table->timestamps();
            $table->softDeletes(); // Soft deletes enabled
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
