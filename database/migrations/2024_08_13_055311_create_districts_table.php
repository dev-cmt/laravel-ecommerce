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
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id')->constrained()->onDelete('cascade');
            $table->string('name'); // District name
            $table->string('bn_name')->nullable(); // Bengali name
            $table->string('lat')->nullable(); // Latitude
            $table->string('lon')->nullable(); // Longitude
            $table->string('url')->nullable(); // URL
            $table->timestamps(); // Created at and updated at timestamps

            // If you want to add unique constraints or indexes, you can do it here
            $table->unique(['division_id', 'name']); // Unique constraint to avoid duplicate districts in the same division
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};
