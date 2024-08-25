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
            $table->string('product_name')->nullable();
            $table->string('sku_code')->nullable();
            $table->text('url_slug')->unique();
            $table->string('img_path')->nullable();
            $table->foreignId('category_id')->constrained('categories');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->longText('description')->nullable();
            $table->text('short_description')->nullable();
            $table->string('manufacturer_name')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('discount', 5, 2)->nullable();
            $table->json('tags')->nullable();
            $table->timestamp('publish_schedule')->nullable();
            $table->enum('visibility', ['Public', 'Hidden'])->default('Public'); // Fixed default value
            $table->enum('status', ['Published', 'Scheduled', 'Draft'])->default('Draft'); // Fixed default value
            
            // Meta data fields
            $table->string('meta_title')->nullable();  // Meta Title
            $table->string('meta_keywords')->nullable();  // Meta Keywords
            $table->text('meta_description')->nullable();  // Meta Description
            
            $table->timestamps();
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
