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
        Schema::create('responses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('response_description');
            $table->unsignedSmallInteger('aprox_solution_time'); // in minutes
            $table->unsignedSmallInteger('aprox_arrival_time'); // in minutes
            $table->decimal('pre_quote_amount', 10, 2, true)->default(0);
            $table->timestamps();

            $table->unsignedInteger('request_id');
            $table->foreign('request_id')->references('id')->on('requests')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->unsignedInteger('workshop_id');
            $table->foreign('workshop_id')->references('id')->on('workshops')
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
        Schema::dropIfExists('responses');
    }
};
