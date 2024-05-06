<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FilmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 1000; $i++) {
            \App\Models\Films::create([
                'title' => $faker->name,
                'director' => $faker->name,
                'producer' => $faker->name,
                'release_date' => $faker->date,
            ]);
        }
    }
}
