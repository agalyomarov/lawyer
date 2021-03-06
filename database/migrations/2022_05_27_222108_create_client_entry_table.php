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
        Schema::create('client_entry', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('entry_id');
            $table->unsignedBigInteger('service_id');
            $table->string('status');
            $table->string('payment_id');
            $table->string('link');
            $table->string('view');
            $table->unique(['client_id', 'entry_id', 'service_id'], 'client_entry_uniquex');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_entry');
    }
};
