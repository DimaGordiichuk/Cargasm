<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameLikesCount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('likes_count', 'likeable_count');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->renameColumn('likes_count', 'likeable_count');
        });
        Schema::table('photos', function (Blueprint $table) {
            $table->renameColumn('likes_count', 'likeable_count');
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
            $table->renameColumn('likeable_count', 'likes_count');
        });
        Schema::table('events', function (Blueprint $table) {
            $table->renameColumn('likeable_count', 'likes_count');
        });
        Schema::table('photos', function (Blueprint $table) {
            $table->renameColumn('likeable_count', 'likes_count');
        });
    }
}
