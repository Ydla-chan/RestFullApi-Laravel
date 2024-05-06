<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            \App\Models\Books::create([
                'name' => $faker->name,
                'author' => $faker->name,
                'description' => $faker->text,
                'category' => $faker->word,
            ]);
        }
    }
}
