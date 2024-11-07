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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id(); // Unique identifier for each coupon
            $table->string('coupon_code')->unique(); // Unique code for customers to apply
            $table->string('title')->nullable(); // Optional title for display purposes
            $table->enum('discount_type', ['percentage', 'amount', 'quantity'])->default('amount'); // Type of discount
            $table->decimal('discount_value', 10, 2); // Value of the discount, make mandatory
            $table->boolean('free_shipping')->default(false); // Indicates if the coupon provides free shipping
            $table->boolean('individual_use_only')->default(false); // Cannot be combined with other coupons
            $table->integer('usage_limit_per_coupon')->nullable(); // Max times the coupon can be used
            $table->integer('usage_limit_per_user')->nullable(); // Max times a user can use the coupon
            $table->date('start_date')->nullable(); // When the coupon becomes valid
            $table->date('expiry_date')->nullable(); // When the coupon expires
            $table->decimal('min_purchase_amount', 10, 2)->nullable(); // Minimum purchase amount to use the coupon
            $table->decimal('max_discount_amount', 10, 2)->nullable(); // Maximum discount amount for percentage-based coupons
            $table->text('description')->nullable(); // Optional description for terms and conditions
            $table->enum('status', ['active', 'inactive', 'expired'])->default('active'); // Status of the coupon
        
            // Categories and products the coupon applies to or excludes
            $table->json('eligible_categories')->nullable(); // Applicable categories (e.g., "Electronics", "Clothing")
            $table->json('excluded_categories')->nullable(); // Excluded categories
            $table->json('eligible_products')->nullable(); // Specific eligible products
            $table->json('excluded_products')->nullable(); // Specific excluded products
        
            $table->boolean('auto_apply')->default(false); // If the coupon should be applied automatically at checkout
            $table->foreignId('customer_group_id')->nullable()->constrained()->onDelete('set null'); // Link to customer group, if any
            $table->foreignId('store_id')->nullable()->constrained()->onDelete('set null'); // Link to store, if multi-store setup
            $table->integer('used_count')->default(0); // Count of how many times the coupon has been used
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
