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
        Schema::table('articles', function (Blueprint $table) {
            $table->text('short_description')->change();
        });
    }
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('short_description')->change();
        });
    }
};
