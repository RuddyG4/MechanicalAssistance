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
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('request_title', 50);
            $table->string('request_description');
            $table->string('request_location');
            $table->char('request_state', 1)->default('O'); // O = open, C = closed, E = evaluating
            $table->timestamps();

            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->unsignedInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
