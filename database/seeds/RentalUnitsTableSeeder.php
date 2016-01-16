<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RentalUnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rental_units')->delete();

        $rental_units = array(
            ['id' => 1, 'user_id' => 1, 'type' => 'Private room', 'rent' => 1100, 'move_in_from' => Carbon::createFromDate(2016, 3, 1, 'Europe/Skopje'),
                'lease_length' => 6, 'address' => 'Myrtle Ave and Bushwick Ave', 'city' => 'New York',
                'class' => 'Luxury', 'num_bedrooms' => 3, 'num_bathrooms' => 2,
                'description' => 'Bright room w/closet and windows in a 3bd/2b off the Morgan L / Myrtle JMZ available. Fits a queen bed/desk easily. Myrtle stop is a block away, along with the best bars/cafes. The apartment is unfurnished, but I\'ll be making the living room/kitchen cute upon move-in. There is a big yard and roof access too, two rooms to choose from. Looking for roommates in their 20\'s who are creatively inclined, responsible, and clean.',
                'furniture' => 'Only shared rooms', 'wifi' => 1, 'elevator' => 1, 'laundry' => 1, 'pets' => 0, 'private_bathroom' => 0, 'doorman' => 0, 'air_conditioning' => 0,
                'created_at' => Carbon::create(2016, 1, 10, 15, 50, 21, "Europe/Skopje"), 'updated_at' => Carbon::create(2016, 1, 10, 15, 50, 21, "Europe/Skopje")],

            ['id' => 2, 'user_id' => 2, 'type' => 'Apartment', 'rent' => 1325, 'move_in_from' => Carbon::createFromDate(2016, 4, 1, 'Europe/Skopje'),
                'lease_length' => 12, 'address' => '284 Eastern Parkway', 'city' => 'New York',
                'class' => 'Large', 'num_bedrooms' => 2, 'num_bathrooms' => 1,
                'description' => 'AMAZING location right near the museum and park ( few minutes walk), and all the amazing restaurants and bars on Franklin Ave, Washington Ave, and walking distance to Park Slope. Feel free to contact me if you would like to see the place!',
                'furniture' => 'Unfurnished', 'wifi' => 1, 'elevator' => 1, 'laundry' => 1, 'pets' => 1, 'private_bathroom' => 1, 'doorman' => 1, 'air_conditioning' => 0,
                'created_at' => Carbon::create(2016, 1, 11, 22, 47, 41, "Europe/Skopje"), 'updated_at' => Carbon::create(2016, 1, 11, 22, 56, 41, "Europe/Skopje")],

            ['id' => 3, 'user_id' => 2, 'type' => 'Private room', 'rent' => 1500, 'move_in_from' => Carbon::createFromDate(2016, 5, 1, 'Europe/Skopje'),
                'lease_length' => 12, 'address' => '27 and Lex', 'city' => 'New York',
                'class' => 'Luxury', 'num_bedrooms' => 3, 'num_bathrooms' => 2,
                'description' => 'Amazing brand new renovated space on 27th and Lex in doorman building with huge backyard! Looking for a third roommate for a brand new empty room. serious inquiries only',
                'furniture' => 'Unfurnished', 'wifi' => 1, 'elevator' => 1, 'laundry' => 1, 'air_conditioning' => 1, 'private_bathroom' => 1, 'pets' => 0, 'doorman' => 0,
                'created_at' => Carbon::create(2016, 1, 11, 25, 47, 8, "Europe/Skopje"), 'updated_at' => Carbon::create(2016, 1, 11, 25, 56, 8, "Europe/Skopje")],
        );

        DB::table('rental_units')->insert($rental_units);
    }
}
