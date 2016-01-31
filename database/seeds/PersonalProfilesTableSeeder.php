<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PersonalProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personal_profiles')->delete();

        $personal_profiles = array(
            ['id' => 1, 'for_user' => 1, 'first_name' => 'Viktor', 'last_name' => 'Janevski', 'gender' => 'Male',
                'relationship_status' => 'Single', 'education' => 'FINKI', 'occupation' => 'Computer scientist',
                'workplace' => 'Unemployed', 'hometown' => 'Skopje', 'location' => 'Skopje',
                'description' => 'This is my example admin profile',
                'created_at' => Carbon::create(2016, 1, 10, 11, 54, 21, "Europe/Skopje"), 'updated_at' => Carbon::create(2016, 1, 10, 11, 54, 21, "Europe/Skopje")],

            ['id' => 2, 'for_user' => 2, 'first_name' => 'Molly', 'last_name' => 'Bing', 'gender' => 'Female',
                'relationship_status' => 'Single', 'education' => 'Santa Clara University', 'occupation' => 'PR/Communications',
                'workplace' => 'Unemployed', 'hometown' => 'San Francisco, Ca', 'location' => 'New York',
                'description' => 'Hi there! After living in the Bay Area my entire life, I\'m a California girl who is ready for a change of pace in NYC. I work in tech PR/communications, am a Pure Barre addict, love red wine and dogs, and am social but very independent. I love going out with friends and exploring new places, but I equally love staying in with a good book and glass of wine. I enjoy being social, but prefer to not have the party follow me home all the time. I\'m looking for young professionals to live with who are clean, friendly, have a sense of humor, and similar interests/lifestyles.',
                'created_at' => Carbon::create(2016, 1, 12, 17, 32, 4, "Europe/Skopje"), 'updated_at' => Carbon::create(2016, 1, 12, 17, 32, 4, "Europe/Skopje")],

            ['id' => 3, 'for_user' => 3, 'first_name' => 'Pete', 'last_name' => 'Pirone', 'gender' => 'Male',
                'relationship_status' => 'Single', 'education' => 'York College Of Pennsylvania', 'occupation' => 'Advertising Copywriter',
                'workplace' => 'Macys', 'hometown' => 'Seaford, Ny', 'location' => 'Seaford, Ny',
                'description' => 'I\'m a 26 year old copywriter working in New York City at Macys.com. I have to be into work by 10am, but get in most mornings by 9am. Most nights I\'m home by 6pm. I take a class once a week at SVA. During the semester I spend a lot of time working on that. I grew up in a small town in Long Island, where I currently live with my family. Most nights I\'m in the gym (a building with a gym is a HUGE plus.) I eat pretty healthy and can cook - and like to cook. I\'m a big sports fans. I love my Mets, Giants, Knicks and Islanders. I also love movies and tend to quote them a lot. I like to go out on the weekend, but nothing beats staying in and relaxing. If I lived in the city, I\'m sure it would open me up to going out a lot more, but I usually go out around 2 weekends a month. I drink, but my college days are definitely over. When I do drink, I love beer. I\'m looking for someone like myself. You don\'t have to be a sports fan, but it\'d be cool to have someone to watch with. You should be clean. I\'m pretty clean and expect the same. I don\'t mind smokers so long as you don\'t do it in the apartment and drugs are an instant deal breaker. I\'ll be honest, I\'m not ACTIVELY looking for a place. I\'m trying this out. If the right roommate or room pops up, I\'ll look into it.',
                'created_at' => Carbon::create(2016, 1, 13, 21, 49, 11, "Europe/Skopje"), 'updated_at' => Carbon::create(2016, 1, 13, 21, 49, 11, "Europe/Skopje")],
        );

        DB::table('personal_profiles')->insert($personal_profiles);
    }
}
