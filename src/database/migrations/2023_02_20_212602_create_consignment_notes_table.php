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
        Schema::create('consignment_notes', function (Blueprint $table) {
            $table->general();
            $table->unsignedInteger('number');
            $table->foreignUuid('point_id')->index();
            $table->unsignedTinyInteger('type');
            $table->unsignedTinyInteger('status')->default(0);

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
        Schema::dropIfExists('consignment_notes');
    }
};
