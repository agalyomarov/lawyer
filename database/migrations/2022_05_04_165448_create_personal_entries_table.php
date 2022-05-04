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
            $table->string('block');
            $table->unsignedBigInteger('personal_id');
            $table->boolean('publishing');
            $table->string('day');
            $table->string('start');
            $table->string('end');
            $table->boolean('enable');
            $table->unique(['personal_id', 'day', 'start', 'end'], 'personal_day_start_end_unigx');
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
