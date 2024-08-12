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
        Schema::create('surgical_interventions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_registry_id');
            $table->string('intervention')->nullable();
            $table->string('due_time')->nullable();
            $table->text('details')->nullable();
            $table->date('date_line')->nullable();
            $table->decimal('cost', 10, 2)->nullable();
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
        Schema::dropIfExists('surgical_interventions');
    }
};
