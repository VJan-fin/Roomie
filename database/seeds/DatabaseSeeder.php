<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call('UserTableSeeder');
        $this->call('PersonalProfilesTableSeeder');
        $this->call('RoommateProfilesTableSeeder');
        $this->call('RentalUnitsTableSeeder');
        $this->call('CommentsTableSeeder');
        $this->call('RatingsTableSeeder');

        Model::reguard();
    }
}
