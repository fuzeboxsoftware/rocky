<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

    	$limit = 50;

    	for ($i = 0; $i < $limit; $i++) {
    		DB::table('players')->insert([
	        	'first_name' => $faker->firstName,
	        	'last_name' => $faker->lastName,
	        	'team_id' => rand(1, 4),
	        	'created_at' => Carbon::now(),
	        	'updated_at' => Carbon::now()
	        ]);
    	}
    }
}
