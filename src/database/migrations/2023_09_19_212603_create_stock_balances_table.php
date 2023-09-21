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
    public function up()
    {
        Schema::create('stock_balances', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('item_id')->index();
            $table->foreignUuid('point_id')->index();
            $table->unsignedFloat('quantity');
            $table->decimal('base_price');
            $table->general();

            $table->unique(['item_id', 'point_id']);

            $table->foreign('item_id')
                ->references('id')
                ->on('items')
                ->onDelete('RESTRICT');

            $table->foreign('point_id')
                ->references('id')
                ->on('points')
                ->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_balances');
    }
};
