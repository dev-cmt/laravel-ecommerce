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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('store_name')->nullable();
            $table->string('store_code')->unique();
            $table->foreignId('manager_id')->nullable()->constrained('users')->onDelete('set null'); // Foreign key to users (store manager)
            // Address details
            $table->string('address')->nullable();
            $table->string('district')->nullable();
            $table->string('division')->nullable();
            $table->string('country')->default('Bangladesh');
            $table->string('postal_code', 4)->nullable();
            // Additional fields
            $table->string('phone')->nullable(); // Store contact number
            $table->string('email')->nullable(); // Store email for communication
            $table->text('description')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
