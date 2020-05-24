<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ru_RU');
    	foreach (range(1,100) as $index) {
	        DB::table('news')->insert([
	            'author' => $faker->name,
	            'category_id' => $faker->numberBetween($min = 1, $max = 12),
	            'resource_id' => $faker->numberBetween($min = 1, $max = 12),
	            'title' => $faker->realText($maxNbChars = 70, $indexSize = 2),
	            'img' => $faker->unixTime($max = 'now').'.jpg',
	            'text' => $faker->realText($maxNbChars = 1000, $indexSize = 2),
	            'active' => $faker->boolean,
                'updated_user_id' => 1,
                'created_user_id' => 1,
                'ip' => $faker->ipv4,
                'updated_at' => now(),
                'created_at' => now(),
	        ]);
	    }
    }
}