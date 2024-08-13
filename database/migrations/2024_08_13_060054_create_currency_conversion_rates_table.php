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
        Schema::create('currency_conversion_rates', function (Blueprint $table) {
            $table->id();
            $table->string('source_currency');
            $table->decimal('source_amount', 10, 2);
            $table->string('target_currency');
            $table->decimal('target_amount', 10, 2);
            $table->decimal('exchange_rate', 10, 2);
            $table->timestamp('last_updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currency_conversion_rates');
    }
};
