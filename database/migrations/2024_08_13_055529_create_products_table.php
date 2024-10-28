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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->index(); // Index for quick lookups
            $table->string('sku_code')->nullable()->index(); // Index if often queried
            $table->string('url_slug')->unique(); // Unique slug for SEO
            $table->string('main_image')->nullable(); // Image path
            $table->foreignId('category_id')->constrained('categories'); // Foreign key to categories
            $table->foreignId('brand_id')->nullable()->constrained('brands'); // Foreign key to brands
            $table->longText('description')->nullable(); // Detailed description
            $table->text('short_description')->nullable(); // Short description
            $table->string('manufacturer_name')->nullable(); // Manufacturer name
            $table->decimal('price', 10, 2)->nullable(); // Price field
            $table->decimal('discount', 5, 2)->nullable(); // Discount field
            $table->json('tags')->nullable(); // Tags as JSON
            $table->timestamp('publish_schedule')->nullable(); // Scheduling field
            $table->enum('visibility', ['public', 'hidden'])->default('public'); // Default visibility
            $table->enum('status', ['published', 'scheduled', 'draft'])->default('draft'); // Default status
            
            // Meta data fields
            $table->string('meta_title')->nullable(); // Meta Title
            $table->string('meta_keywords')->nullable(); // Meta Keywords
            $table->text('meta_description')->nullable(); // Meta Description
        
            // Counters
            $table->unsignedInteger('sales_count')->default(0); // Sales count
            $table->unsignedInteger('view_count')->default(0); // View count
            $table->unsignedInteger('wishlist_count')->default(0); // Wishlist count
        
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key for user
            $table->timestamps();
            
            // Optional: Soft deletes
            $table->softDeletes();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
