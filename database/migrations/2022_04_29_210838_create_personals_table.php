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
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('fullname');
            $table->string('chpu');
            $table->string('h1');
            $table->string('description');
            $table->string('media');
            $table->text('content')->nullable();
            $table->string('regnumber');
            $table->string('interval');
            $table->boolean('publishing')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personals');
    }
};
