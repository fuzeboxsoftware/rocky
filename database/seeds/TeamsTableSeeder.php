<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

    	$limit = 4;

    	for ($i = 0; $i < $limit; $i++) {
    		DB::table('teams')->insert([
	        	'name' => $faker->colorName,
	        	'created_at' => Carbon::now(),
	        	'updated_at' => Carbon::now()
	        ]);
    	}
    }
}
