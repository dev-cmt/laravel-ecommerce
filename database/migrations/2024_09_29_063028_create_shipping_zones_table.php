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
        Schema::create('shipping_zones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipping_method_id')->constrained('shipping_methods')->onDelete('cascade');
            $table->string('zone_name'); // "Dhaka", "Khulna", "International"
            $table->decimal('cost', 10, 2); // Cost for the shipping zone
            $table->boolean('is_active')->default(true); // Field to activate/deactivate zones
            $table->timestamps();
        
            // Adding a unique constraint if required
            $table->unique(['zone_name', 'shipping_method_id']); // Prevent duplicates of zone names for each method
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_zones');
    }
};
