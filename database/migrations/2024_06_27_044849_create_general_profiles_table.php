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
        Schema::create('general_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->date('dob')->nullable();
            $table->integer('age')->nullable();
            $table->string('religion')->nullable();
            $table->decimal('height_feet', 3, 1)->nullable();
            $table->decimal('height_inches', 3, 1)->nullable();
            $table->decimal('weight_kg', 6, 2)->nullable();
            $table->decimal('weight_pounds', 6, 2)->nullable();
            $table->decimal('bmi', 5, 2)->nullable();
            $table->string('emergency_contact')->nullable();
            $table->unsignedBigInteger('mast_nationality_id')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
            
            // Foreign key
            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_profiles');
    }
};
