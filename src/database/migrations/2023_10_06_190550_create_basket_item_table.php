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
        Schema::create('basket_item', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('basket_id')->index();
            $table->foreignUuid('item_id')->index();
            $table->unsignedFloat('quantity');

            $table->unique(['basket_id', 'item_id']);

            $table->foreign('basket_id')
                ->references('id')
                ->on('baskets')
                ->onDelete('RESTRICT');

            $table->foreign('item_id')
                ->references('id')
                ->on('items')
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
        Schema::dropIfExists('basket_item');
    }
};
