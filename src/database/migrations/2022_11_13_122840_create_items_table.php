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
        Schema::create('items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title', 100)->index()->unique();
            $table->string('code', 50)->index();
            $table->string('unit', 3);
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->foreignUuid('category_id')->index()->nullable();
            $table->general();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
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
        Schema::dropIfExists('items');
    }
};
