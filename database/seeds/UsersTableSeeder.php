<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

    	$limit = 5;

    	for ($i = 0; $i < $limit; $i++) {
    		DB::table('users')->insert([
	        	'name' => $faker->name,
	        	'email' => $faker->unique()->email,
	        	'password' => bcrypt('secret'),
	        	'created_at' => Carbon::now(),
	        	'updated_at' => Carbon::now()
	        ]);
    	}
    }
}
