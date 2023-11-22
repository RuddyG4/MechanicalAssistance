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
            $table->char('request_state');
            $table->timestamps();

            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')
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