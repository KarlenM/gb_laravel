<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['en' => 'Politics',    'ru' => 'Политика'],
            ['en' => 'Economics',   'ru' => 'Экономика'],
            ['en' => 'IT',          'ru' => 'ИТ'],
            ['en' => 'Sport',       'ru' => 'Спорт'],
            ['en' => 'Bussines',    'ru' => 'Бизнес'],
            ['en' => 'Society',     'ru' => 'Общество'],
            ['en' => 'Army',        'ru' => 'Армия'],
            ['en' => 'Opinion',     'ru' => 'Мнения'],
            ['en' => 'Culture',     'ru' => 'Культура'],
            ['en' => 'Science',     'ru' => 'Наука'],
            ['en' => 'Cars',        'ru' => 'Авто'],
            ['en' => 'Style',       'ru' => 'Стиль']
        ];
        $faker = Faker::create('ru_RU');
    	foreach (range(1,10) as $index) {
            $name = $faker->unique(false)->randomElement($categories);
	        DB::table('news_category')->insert([
	            'name_cyr' => $name['ru'],
	            'name_lat' => $name['en'],
                'updated_user_id' => 1,
                'created_user_id' => 1,
                'ip' => $faker->ipv4,
                'updated_at' => now(),
                'created_at' => now(),
	        ]);
	    }
    }
}
