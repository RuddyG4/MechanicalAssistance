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
        Schema::create('workshops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('workshop_name', 50);
            $table->string('workshop_address');
            $table->string('workshop_location');
            $table->boolean('workshop_state')->default(true);
            $table->unsignedSmallInteger('workshop_rating')->default(0);
            $table->timestamps();

            $table->unsignedInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshops');
    }
};
