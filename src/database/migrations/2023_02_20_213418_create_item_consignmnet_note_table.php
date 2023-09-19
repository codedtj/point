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
        Schema::create('consignment_note_item', function (Blueprint $table) {
            $table->general();
            $table->foreignUuid('item_id')->index();
            $table->foreignUuid('consignment_note_id')->index();
            $table->unsignedFloat('quantity');
            $table->decimal('price');

            $table->foreign('item_id')
                ->references('id')
                ->on('items')
                ->onDelete('RESTRICT');

            $table->foreign('consignment_note_id')
                ->references('id')
                ->on('consignment_notes')
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
        Schema::dropIfExists('consignment_note_item');
    }
};
