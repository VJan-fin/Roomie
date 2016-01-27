<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_images', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('for_user')->unsigned();
            $table->foreign('for_user')->references('id')->on('users')->onDelete('cascade');

            $table->string('caption')->nullable();
            $table->string('description', 500)->nullable();

            $table->string('location');
            $table->string('mime_type');

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
        Schema::drop('profile_images');
    }
}
