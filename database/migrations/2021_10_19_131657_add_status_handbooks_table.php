<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusHandbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('handbooks', function (Blueprint $table) {
            $table->string('status')->nullable();
            $table->integer('car_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('handbooks', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('car_id');
        });
    }
}
