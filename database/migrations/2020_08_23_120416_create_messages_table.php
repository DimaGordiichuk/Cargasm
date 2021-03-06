<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conv_id');
            $table->unsignedBigInteger('sender');
            $table->unsignedBigInteger('addressee');
            $table->boolean('readed');
            $table->boolean('sender_delete');
            $table->boolean('addressee_delete');
            $table->text('message');
            $table->timestamps();

            $table->foreign('conv_id')->references('id')->on('conversations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
