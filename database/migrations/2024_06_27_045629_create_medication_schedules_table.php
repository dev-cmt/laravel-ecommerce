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
        Schema::create('medication_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_registry_id');
            $table->unsignedBigInteger('mast_equipment_id');
            $table->string('full_name')->nullable();
            $table->unsignedBigInteger('mast_power_id');
            $table->string('duration')->nullable();
            $table->string('frequency')->nullable();
            $table->time('morning')->nullable();
            $table->time('noon')->nullable();
            $table->time('night')->nullable();
            $table->string('cost')->nullable();
            $table->string('timing')->nullable();
            $table->string('antibiotic')->nullable();
            $table->timestamps();
    
            // Define foreign keys
            $table->foreign('case_registry_id')->references('id')->on('case_registries')->onDelete('cascade');
            $table->foreign('mast_equipment_id')->references('id')->on('mast_equipment')->onDelete('cascade');
            $table->foreign('mast_power_id')->references('id')->on('mast_powers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medication_schedules');
    }
};
