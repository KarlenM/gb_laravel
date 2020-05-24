<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NewsResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ru_RU');
    	foreach (range(1,10) as $index) {
	        DB::table('news_resources')->insert([
	            'name' => $faker->company,
                'updated_user_id' => 1,
                'created_user_id' => 1,
                'ip' => $faker->ipv4,
                'updated_at' => now(),
                'created_at' => now(),
	        ]);
	    }
    }
}
