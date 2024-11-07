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
        Schema::create('shipping_methods', function (Blueprint $table) {
            $table->id();
            $table->string('method_name')->unique; // "Free Shipping", "Standard Shipping", "International Shipping", "Express Shipping", "Local Pickup"
            $table->text('description')->nullable(); //"Delivered within 3-5 business days"
            $table->decimal('cost', 10, 2)->nullable(); // Cost for the shipping
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_methods');
    }
};
