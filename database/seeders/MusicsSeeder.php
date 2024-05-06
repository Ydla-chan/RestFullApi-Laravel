<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MusicsSeeder extends Seeder
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
            \App\Models\Musics::create([
                'title' => $faker->name,
                'artist' => $faker->name,
                'producer' => $faker->name,
                'release_date' => $faker->date,
            ]);
        }
    }
}
