<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_profiles', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('for_user')->unsigned();
            $table->foreign('for_user')->references('id')->on('users')->onDelete('cascade');

            $table->string('first_name');
            $table->string('last_name');

            $table->enum('gender', ['Male', 'Female'])->default('Male');
            $table->enum('relationship_status', ['Single', 'Dating', 'In a Relationship', 'Married'])->default('Single');

            $table->string('education')->nullable();
            $table->string('occupation')->nullable();
            $table->string('workplace')->nullable();
            $table->string('hometown')->nullable();
            $table->string('location')->nullable();

            $table->string('description', 1000)->nullable();

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
        Schema::drop('personal_profiles');
    }
}
