<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 25; $i++) {
            $faker = Factory::create('ru_RU');
            DB::table('books')->insert([
                'name' => $faker->word,
                'description' => $faker->realText(1500),
                'image' => 'book-' . $faker->numberBetween(1, 6) . '.jpg',
            ]);
        }
    }
}
