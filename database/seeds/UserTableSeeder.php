<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = array(
            ['id' => 1, 'name' => 'Viktor', 'email' => 'vikjan94@gmail.com', 'password' => Hash::make('secret'), 'role' => 'admin', 'registration_complete' => true,
                'created_at' => Carbon::create(2016, 1, 10, 11, 54, 21, "Europe/Skopje"), 'updated_at' => Carbon::create(2016, 1, 10, 11, 54, 21, "Europe/Skopje")],

            ['id' => 2, 'name' => 'Molly', 'email' => 'molly.bing@gmail.com', 'password' => Hash::make('secret'), 'role' => 'user', 'registration_complete' => true,
                'created_at' => Carbon::create(2016, 1, 12, 17, 32, 4, "Europe/Skopje"), 'updated_at' => Carbon::create(2016, 1, 12, 17, 32, 4, "Europe/Skopje")],

            ['id' => 3, 'name' => 'Pete', 'email' => 'pete.pirone@gmail.com', 'password' => Hash::make('secret'), 'role' => 'user', 'registration_complete' => true,
                'created_at' => Carbon::create(2016, 1, 13, 21, 49, 11, "Europe/Skopje"), 'updated_at' => Carbon::create(2016, 1, 13, 21, 49, 11, "Europe/Skopje")],
        );

        DB::table('users')->insert($users);
    }
}
