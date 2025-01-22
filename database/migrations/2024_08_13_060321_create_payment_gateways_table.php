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
        Schema::create('payment_gateways', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the payment gateway (e.g., 'bKash', 'PayPal', etc.)
            $table->enum('gateway_type', ['Online', 'Manual'])->default('Online'); // Defines if it's an online or manual gateway
            $table->text('description')->nullable(); // Optional description of the gateway
            $table->string('api_key')->nullable(); // API Key for online gateways (nullable)
            $table->string('merchant_id')->nullable(); // Merchant ID for integration (nullable)
            $table->string('secret_key')->nullable(); // Secret Key for integration (nullable)
            $table->string('payment_url')->nullable(); // URL for payment processing (nullable)
            $table->string('image_path')->nullable(); // Logo payment gateway
            $table->boolean('is_active')->default(true); // Indicates if the gateway is active
            $table->enum('currency', ['USD', 'BDT', 'EUR', 'GBP', 'INR', 'AUD', 'JPY'])->default('BDT'); // Currency used
            $table->integer('priority')->default(1); // Priority for displaying gateways
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_gateways');
    }
};
