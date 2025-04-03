<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CompaniesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        Company::create([
            'name' => $faker->name(),
            'image_url' => $faker->imageUrl(),
            'website_url' => $faker->url,
            'description' => $faker->paragraph,
            'linkedin_url' => $faker->url,
            'user_id' => 3,
        ]);


        Company::create([
            'name' => $faker->name(),
            'image_url' => $faker->imageUrl(),
            'website_url' => $faker->url,
            'description' => $faker->paragraph,
            'linkedin_url' => $faker->url,
            'user_id' => 4,
        ]);
    }
}
