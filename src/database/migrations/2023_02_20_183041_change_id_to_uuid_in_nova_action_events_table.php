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
        Schema::table('action_events', function (Blueprint $table) {
            $table->uuid('actionable_id')->change();
            $table->uuid('target_id')->change();
            $table->uuid('model_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('action_events', function (Blueprint $table) {
        });
    }
};
