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
            $table->string('image')->nullable();
            $table->string('fullname')->nullable();
            $table->string('chpu')->nullable();
            $table->string('h1')->nullable();
            $table->string('description')->nullable();
            $table->string('media')->nullable();
            $table->string('shurt_description')->nullable();
            $table->text('content')->nullable();
            $table->string('regnumber')->nullable();
            $table->string('interval')->nullable();
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
