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
        Schema::create('mechanics', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->foreign('id')->references('id')->on('users');
            $table->string('speciality', 50);
            $table->boolean('disponibility')->default(1); // 0 = not available, 1 = available
            
            $table->primary('id');
            $table->unsignedInteger('workshop_id');
            $table->foreign('workshop_id')->references('id')->on('workshops');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mechanics');
    }
};
