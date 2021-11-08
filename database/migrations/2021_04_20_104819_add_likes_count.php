<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLikesCount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('likes_count')->nullable();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->string('likes_count')->nullable();
        });
        Schema::table('photos', function (Blueprint $table) {
            $table->string('likes_count')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('likes_count');
        });
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('likes_count');
        });
        Schema::table('photos', function (Blueprint $table) {
            $table->dropColumn('likes_count');
        });
    }
}
