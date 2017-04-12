<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('event_name');
            $table->integer('event_admin');
            $table->text('event_title');
            $table->text('event_description');
            $table->dateTime('event_start_datetime');
            $table->dateTime('event_end_datetime');
            $table->text('event_status');
            $table->tinyInteger('numbers');
            $table->integer('created_by');
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
        //
    }
}
