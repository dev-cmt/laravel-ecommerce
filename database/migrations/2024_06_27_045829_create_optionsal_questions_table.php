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
        Schema::create('optionsal_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_registry_id');
            $table->string('admitted_following_diagnosis')->nullable();
            $table->string('hospitalization_duration')->nullable();
            $table->decimal('total_cost_incurred', 10, 2)->nullable();
            $table->string('medication_effectiveness')->nullable();
            $table->string('satisfied_with_treatment')->nullable();
            $table->string('recommend_physician')->nullable();
            $table->timestamps();
            
            // Foreign keys
            $table->foreign('case_registry_id')->references('id')->on('case_registries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('optionsal_questions');
    }
};
