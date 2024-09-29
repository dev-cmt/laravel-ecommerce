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
        Schema::create('upazilas', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary key
            $table->bigInteger('district_id')->unsigned();$table->string('name'); // Upazila name
            $table->string('bn_name')->nullable(); // Bengali name of the upazila
            $table->string('url')->nullable(); // Optional URL for more information
            $table->timestamps(); // Created at and updated at timestamps

            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->unique(['district_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upazilas');
    }
};
