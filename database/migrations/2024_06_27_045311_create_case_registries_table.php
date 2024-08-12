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
        Schema::create('case_registries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->date('date_of_primary_identification')->nullable();
            $table->date('date_of_first_visit')->nullable();
            $table->string('recurrence')->nullable();
            $table->string('duration')->nullable();
            $table->string('duration_unit')->nullable();
            $table->string('area_of_problem')->nullable();
            $table->string('type_of_ailment')->nullable();
            $table->text('additional_complaints')->nullable();
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
        Schema::dropIfExists('case_registries');
    }
};
