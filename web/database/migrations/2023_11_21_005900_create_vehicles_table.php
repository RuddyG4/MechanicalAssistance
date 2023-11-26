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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plate', 7)->unique();
            $table->string('model', 40);
            $table->string('color', 10);
            $table->string('photo')->nullable();
            $table->timestamps();

            $table->unsignedInteger('owner_id');
            $table->unsignedSmallInteger('brand_id');
            $table->unsignedSmallInteger('vehicle_type_id');
            $table->foreign('owner_id')->references('id')->on('customers');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
