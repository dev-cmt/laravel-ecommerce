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
            $table->string('order_number')->unique();
            $table->foreignId('user_id')->constrained('users');
            $table->decimal('total_amount', 10, 2);
            $table->decimal('discount_amount', 10, 2)->nullable();
            $table->decimal('gross_amount', 10, 2);
            $table->decimal('shipping_amount', 10, 2)->nullable();
            $table->decimal('net_amount', 10, 2);
            $table->enum('status', ['placed', 'processing', 'shipping', 'delivered']);
            $table->enum('payment_status', ['paid', 'not_paid']);
            $table->enum('payment_type', ['net-banking', 'UPI', 'cod']);
            $table->string('payment_transaction_id')->nullable();
            $table->foreignId('coupon_code')->nullable()->constrained('coupons');
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
