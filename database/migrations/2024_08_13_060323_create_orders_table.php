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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique(); // Unique order number for identification
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('shipping_address_id')->nullable()->constrained('shipping_addresses');
            $table->foreignId('coupon_id')->nullable()->constrained('coupons');
            $table->decimal('total_amount', 10, 2)->nullable(); // Total value of the items in the order
            $table->decimal('discount_amount', 10, 2)->nullable(); // Coupon Discount applied (total_amount * discount_amount%)
            $table->decimal('gross_amount', 10, 2)->nullable(); // Total after discount (total_amount - discount_amount)
            $table->decimal('shipping_amount', 10, 2)->nullable(); // Shipping cost
            $table->decimal('net_amount', 10, 2)->nullable(); // Final amount to pay (gross_amount + shipping_amount)
            $table->text('order_notes')->nullable();
            $table->enum('status', ['Placed', 'Processing', 'Shipped', 'Delivered', 'Cancelled'])->default('Placed'); // Order status
            $table->enum('payment_status', ['Pending', 'Paid', 'Failed', 'Refunded'])->default('Pending'); // Payment status
            $table->foreignId('payment_gateway_id')->nullable()->constrained('payment_gateways'); //'Card', 'bKash', 'Nagad', 'Rocket', 'Cash on Delivery', 'Installment', 'Wallet'
            $table->string('payment_number')->nullable(); // Manual payment system
            $table->string('transaction_number')->nullable(); // Manual payment system
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
