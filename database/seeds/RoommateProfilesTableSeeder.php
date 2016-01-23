<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RoommateProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roommate_profiles')->delete();

        $roommate_profiles = array(
            ['id' => 1, 'for_user' => 1, 'cleanliness' => 4, 'work_schedule' => 3,
                'sleep_schedule' => 4, 'smoking' => 0, 'drinking' => 4,
                'privacy' => 4, 'guests' => 2, 'eating_habits' => 3, 'pets' => 1,
                'monthly_budget_lower_limit' => 850, 'monthly_budget_upper_limit' => 1100,
                'move_in_from' => Carbon::createFromFormat('d/m/Y', '01/05/2016'),
                'lease_length' => 12,
                'looking_for' => 'Roommate with an apartment',
                'exercise' => '', 'hobbies' => '',
                'created_at' => Carbon::create(2016, 1, 10, 11, 54, 21, "Europe/Skopje"), 'updated_at' => Carbon::create(2016, 1, 10, 11, 54, 21, "Europe/Skopje")],

            ['id' => 2, 'for_user' => 2, 'cleanliness' => 4, 'work_schedule' => 4,
                'sleep_schedule' => 4, 'smoking' => 0, 'drinking' => 4,
                'privacy' => 2, 'guests' => 2, 'eating_habits' => 3, 'pets' => 2,
                'monthly_budget_lower_limit' => 1200, 'monthly_budget_upper_limit' => 1350,
                'move_in_from' => Carbon::createFromDate(2016, 3, 1, 'Europe/Skopje'),
                'lease_length' => 1,
                'looking_for' => 'Roommate with an apartment',
                'exercise' => '', 'hobbies' => '',
                'created_at' => Carbon::create(2016, 1, 12, 17, 32, 4, "Europe/Skopje"), 'updated_at' => Carbon::create(2016, 1, 12, 17, 32, 4, "Europe/Skopje")],

            ['id' => 3, 'for_user' => 3, 'cleanliness' => 3, 'work_schedule' => 3,
                'sleep_schedule' => 4, 'smoking' => 0, 'drinking' => 4,
                'privacy' => 2, 'guests' => 2, 'eating_habits' => 5, 'pets' => 1,
                'monthly_budget_lower_limit' => 1500, 'monthly_budget_upper_limit' => 1600,
                'move_in_from' => Carbon::createFromDate(2016, 2, 1, 'Europe/Skopje'),
                'lease_length' => 6,
                'looking_for' => 'Just a roommate',
                'exercise' => 'Going to the gym in the evenings', 'hobbies' => 'Watching sports',
                'created_at' => Carbon::create(2016, 1, 13, 21, 49, 11, "Europe/Skopje"), 'updated_at' => Carbon::create(2016, 1, 13, 21, 49, 11, "Europe/Skopje")],
        );

        DB::table('roommate_profiles')->insert($roommate_profiles);
    }
}
