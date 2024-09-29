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
            $table->id();
            $table->string('coupon_code')->unique();
            $table->string('title')->nullable();
            $table->enum('discount_type', ['percentage', 'amount', 'quantity'])->default('amount');
            $table->decimal('discount_value', 10, 2)->nullable();
            $table->boolean('free_shipping')->default(false);
            $table->boolean('individual_use_only')->default(false); //cannot be combined with other coupons
            $table->integer('usage_limit_per_coupon')->nullable();
            $table->integer('usage_limit_per_user')->nullable();
            $table->date('start_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->decimal('min_purchase_amount', 10, 2)->nullable();
            $table->decimal('max_discount_amount', 10, 2)->nullable(); //maximum discount for percentage-based coupons.
            $table->enum('status', ['active', 'inactive', 'expired'])->default('active');

            $table->json('eligible_categories')->nullable(); //only apply to "Electronics" or "Clothing" categories.
            $table->json('excluded_categories')->nullable(); //not included to "Electronics" or "Clothing" categories.
            $table->json('eligible_products')->nullable(); //only apply to “iPhone 14” or “Nike Air Max”.
            $table->json('excluded_products')->nullable(); //not included to “iPhone 14” or “Nike Air Max”.

            $table->boolean('auto_apply')->default(false);
            $table->foreignId('customer_group_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('description')->nullable();
            $table->foreignId('store_id')->nullable()->constrained()->onDelete('cascade');
            $table->integer('used_count')->default(0);
            $table->timestamps();
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
