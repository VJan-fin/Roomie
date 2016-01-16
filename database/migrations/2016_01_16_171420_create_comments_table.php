<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('from_user')->unsigned();
            $table->foreign('from_user')->references('id')->on('users')->onDelete('cascade');

            $table->integer('on_rental')->unsigned();
            $table->foreign('on_rental')->references('id')->on('rental_units')->onDelete('cascade');

            $table->string('body', 1000);

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
        Schema::drop('comments');
    }
}
