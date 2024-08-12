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
        Schema::create('vaccinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->string('type'); // EPI, Paid, or Covid-19
            $table->string('vaccine_name')->nullable();
            $table->string('dose_01')->nullable();
            $table->string('dose_02')->nullable();
            $table->string('dose_03')->nullable();
            $table->string('dose_04')->nullable();
            $table->string('dose_05')->nullable();
            $table->string('booster')->nullable();
            $table->string('market_name')->nullable();
            $table->string('applicable_for')->nullable();
            $table->string('location')->nullable();
            $table->date('date')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('certificate_number')->nullable();
            $table->text('side_effects')->nullable();
            $table->string('upload_tool')->nullable();
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
        Schema::dropIfExists('vaccinations');
    }
};
