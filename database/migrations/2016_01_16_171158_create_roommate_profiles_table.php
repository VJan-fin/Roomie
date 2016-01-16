<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoommateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roommate_profiles', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('for_user')->unsigned();
            $table->foreign('for_user')->references('id')->on('users')->onDelete('cascade');

            $table->integer('cleanliness')->nullable();
            $table->integer('work_schedule')->nullable();
            $table->integer('sleep_schedule')->nullable();
            $table->integer('smoking')->nullable();
            $table->integer('drinking')->nullable();
            $table->integer('privacy')->nullable();
            $table->integer('guests')->nullable();
            $table->integer('eating_habits')->nullable();
            $table->integer('pets')->nullable();

            $table->integer('monthly_budget_lower_limit');
            $table->integer('monthly_budget_upper_limit');
            $table->date('move_in_from');
            $table->integer('lease_length');
            $table->enum('looking_for', ['Just a roommate', 'Roommate with an appartment', 'Just a room', 'Anything'])->default('Anything');

            $table->string('exercise')->nullable();
            $table->string('hobbies', 500)->nullable();

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
        Schema::drop('roommate_profiles');
    }
}
