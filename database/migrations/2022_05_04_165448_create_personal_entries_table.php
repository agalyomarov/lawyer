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
        Schema::create('personal_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_id');
            $table->string('block_count');
            $table->string('block_start_time');
            $table->string('block_end_time');
            $table->string('entry_date');
            $table->string('entry_start_time');
            $table->string('entry_end_time');
            $table->boolean('entry_enable');
            $table->unique(['personal_id', 'entry_date', 'entry_start_time', 'entry_end_time'], 'personal_date_start_end_unigx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_entries');
    }
};
