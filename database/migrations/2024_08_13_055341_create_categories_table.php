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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name')->index(); // Index for fast lookup
            $table->string('url_slug')->unique(); // Unique slug, no need for a separate index
            $table->foreignId('parent_cat_id')->nullable()->constrained('categories')->onDelete('cascade'); // Cascade delete for parent-child relationship
            $table->string('img_path')->nullable(); // Image path, nullable
            $table->text('description')->nullable(); // Optional description
            $table->enum('status', ['active', 'inactive'])->default('active'); // Default to 'active'
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key for user with cascade delete
            $table->timestamps();
            $table->softDeletes(); // Soft deletes enabled
        
            // Foreign key index
            $table->index('parent_cat_id'); // Indexing for hierarchical category queries
            $table->index('user_id'); // Indexing for querying by user
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
