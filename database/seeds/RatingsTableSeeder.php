<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ratings')->delete();

        $ratings = array(
            ['id' => 1, 'from_user' => 1, 'on_rental' => 2, 'rating_points' => 4,
                'created_at' => Carbon::create(2016, 1, 14, 20, 55, 10, "Europe/Skopje"), 'updated_at' => Carbon::create(2016, 1, 14, 20, 55, 10, "Europe/Skopje")],

            ['id' => 2, 'from_user' => 2, 'on_rental' => 2, 'rating_points' => 5,
                'created_at' => Carbon::create(2016, 1, 14, 22, 12, 35, "Europe/Skopje"), 'updated_at' => Carbon::create(2016, 1, 14, 22, 12, 35, "Europe/Skopje")],

            ['id' => 3, 'from_user' => 3, 'on_rental' => 2, 'rating_points' => 5,
                'created_at' => Carbon::create(2016, 1, 14, 22, 12, 35, "Europe/Skopje"), 'updated_at' => Carbon::create(2016, 1, 14, 22, 12, 35, "Europe/Skopje")],

        );

        DB::table('ratings')->insert($ratings);
    }
}
