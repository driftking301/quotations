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
        Schema::create('part_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('sheetname');
            $table->string('partnumber');
            $table->string('description')->nullable();
            $table->string('weight')->nullable();
            $table->string('unitmeasure');
            $table->string('width')->nullable();
            $table->string('length')->nullable();
            $table->string('area_in2')->nullable();
            $table->string('per_sq_inch')->nullable();
            $table->float('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('part_numbers');
    }
};
