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
        Schema::create('genetic_disease_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->boolean('disease_diabetes')->default(false);
            $table->boolean('disease_stroke')->default(false);
            $table->boolean('disease_heart')->default(false);
            $table->boolean('disease_hyper')->default(false);
            $table->boolean('disease_pressure')->default(false);
            $table->boolean('disease_balding')->default(false);
            $table->boolean('disease_vitiligo')->default(false);
            $table->boolean('disease_disability')->default(false);
            $table->boolean('disease_psoriasis')->default(false);
            $table->boolean('disease_eczema')->default(false);
            $table->text('additional_comments')->nullable();
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
        Schema::dropIfExists('genetic_disease_profiles');
    }
};
