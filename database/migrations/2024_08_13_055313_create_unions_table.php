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
        Schema::create('unions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('upazila_id')->unsigned();
            $table->string('name'); // Union name
            $table->string('bn_name')->nullable(); // Bengali name of the union
            $table->string('url')->nullable(); // URL for more information
            $table->timestamps(); // Created at and updated at timestamps
            
            $table->foreign('upazila_id')->references('id')->on('upazilas')->onDelete('cascade');
            $table->unique(['upazila_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unions');
    }
};
