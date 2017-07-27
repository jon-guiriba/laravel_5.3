<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event');
            $table->string('date');
            $table->string('time');
            $table->string('preparation_venue');
            $table->string('preparation_time');
            $table->string('no_of_heads');
            $table->string('client');
            $table->string('mobile');
            $table->string('email');
            $table->string('message')->nullable();
            $table->string('status')->nullable();
            $table->string('link')->nullable();
            $table->string('ticket_type')->default('free');
            $table->integer('image_id')->unsigned()->nullable();
            $table->foreign('image_id')->references('id')->on('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
