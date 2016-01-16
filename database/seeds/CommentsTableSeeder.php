<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();

        $comments = array(
            ['id' => 1, 'from_user' => 1, 'on_rental' => 2, 'body' => 'This seems like an amazing place. I\'m definitely interested in some more info and images.',
                'created_at' => Carbon::create(2016, 1, 14, 20, 55, 10, "Europe/Skopje"), 'updated_at' => Carbon::create(2016, 1, 14, 20, 55, 10, "Europe/Skopje")],

            ['id' => 2, 'from_user' => 2, 'on_rental' => 2, 'body' => 'I will be happy to give you a tour of the apartment and show you around whenever is a good time for you. Just contact me and we can arrange it.',
                'created_at' => Carbon::create(2016, 1, 14, 22, 12, 35, "Europe/Skopje"), 'updated_at' => Carbon::create(2016, 1, 14, 22, 12, 35, "Europe/Skopje")],
        );

        DB::table('comments')->insert($comments);
    }
}
