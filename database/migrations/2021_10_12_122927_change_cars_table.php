<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('year');

            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->string('generation_name')->nullable();
            $table->string('year_begin')->nullable();
            $table->string('year_end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->string('title');

            $table->dropColumn('name');
            $table->dropColumn('name_en');
            $table->dropColumn('generation_name');
            $table->dropColumn('year_begin');
            $table->dropColumn('year_end');
        });
    }
}
