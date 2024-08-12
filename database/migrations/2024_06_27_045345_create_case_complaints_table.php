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
        Schema::create('case_complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('case_registry_id')->constrained('case_registries')->onDelete('cascade');
            $table->foreignId('mast_complaint_id')->constrained('mast_complaints')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_complaints');
    }
};
