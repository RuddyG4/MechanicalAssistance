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
        Schema::create('multimedia_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('multimedia_path');
            $table->string('multimedia_description')->nullable();
            $table->string('multimedia_type', 10);
            $table->string('multimedia_extension', 5);

            $table->dropPrimary(['id']);
            $table->unsignedInteger('request_id');
            $table->foreign('request_id')
                ->references('id')
                ->on('requests')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->primary(['id', 'request_id']);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multimedia_contents');
    }
};
