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
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service_description');
            $table->decimal('service_price', 10, 2);

            $table->unsignedInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->unsignedInteger('mechanic_id');
            $table->foreign('mechanic_id')->references('id')->on('mechanics')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
