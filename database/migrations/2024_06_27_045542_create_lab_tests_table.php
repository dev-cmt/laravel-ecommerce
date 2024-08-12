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
        Schema::create('lab_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mast_test_id');
            $table->string('type')->nullable();
            $table->unsignedBigInteger('mast_organ_id');
            $table->text('comments')->nullable();
            $table->decimal('cost', 8, 2)->nullable();
            $table->string('lab')->nullable();
            $table->string('upload_tool')->nullable();
            $table->unsignedBigInteger('treatment_profile_id');

            // Foreign key
            $table->foreign('mast_test_id')->references('id')->on('mast_tests')->onDelete('cascade');
            $table->foreign('mast_organ_id')->references('id')->on('mast_organs')->onDelete('cascade');
            $table->foreign('treatment_profile_id')->references('id')->on('treatment_profiles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_tests');
    }
};
