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
        Schema::create('doctor_appointment_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_appointment_id');
            $table->string('appointment')->nullable();
            $table->string('day')->nullable();
            $table->string('time_date_tool')->nullable();
            $table->decimal('fee', 8, 2)->nullable();
            $table->string('note')->nullable();
            $table->timestamps();

            // Foreign key
            $table->foreign('doctor_appointment_id')->references('id')->on('doctor_appointments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_appointment_details');
    }
};
