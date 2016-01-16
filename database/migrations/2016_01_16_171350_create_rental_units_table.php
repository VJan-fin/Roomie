<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_units', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->enum('type', ['Shared room', 'Private room', 'Apartment', 'House']);
            $table->integer('rent');
            $table->date('move_in_from');
            $table->integer('lease_length');
            $table->string('address', 500);
            $table->string('city');
            $table->enum('class', ['Small', 'Standard', 'Large', 'Luxury']);

            $table->string('description', 1000)->nullable();

            $table->integer('num_bedrooms')->nullable();
            $table->integer('num_bathrooms')->nullable();

            $table->enum('furniture', ['Unfurnished', 'Only shared rooms', 'Fully furnished']);

            $table->boolean('pets')->default(0);
            $table->boolean('private_bathroom')->default(0);
            $table->boolean('air_conditioning')->default(0);
            $table->boolean('wifi')->default(0);
            $table->boolean('cable')->default(0);
            $table->boolean('satellite')->default(0);
            $table->boolean('elevator')->default(0);
            $table->boolean('laundry')->default(0);
            $table->boolean('gym')->default(0);
            $table->boolean('doorman')->default(0);

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
        Schema::drop('rental_units');
    }
}
