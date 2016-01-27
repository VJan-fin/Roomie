<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProperyPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_pictures', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('on_rental')->unsigned();
            $table->foreign('on_rental')->references('id')->on('rental_units')->onDelete('cascade');

            $table->string('caption', 50)->nullable();

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
        Schema::drop('property_pictures');
    }
}
