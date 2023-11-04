<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->double('base');
            $table->double('manual')->nullable();
            $table->foreignUuid('item_id')->index();
            $table->foreignUuid('point_id')->index();
            $table->general();

            // Define foreign keys to establish relationships with "item" and "point" models
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('point_id')->references('id')->on('points');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
