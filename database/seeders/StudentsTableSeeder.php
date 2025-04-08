<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        Student::create([
            'name' => 'Anna Dahlberg',
            'image_url' => 'logos/default-logo.jpg',
            'website_url' => 'https://github.com/anna-dahlberg',
            'description' => 'Hej, jag heter Anna är 26 år och intresserad av Frontend-utveckling',
            'cv_url' => 'https://github.com/anna-dahlberg/AlmostOnBoard',
            'linkedin_url' => 'https://www.linkedin.com/in/anna-dahlberg-5507b4176/',
            'user_id' => 1,
            'class_id' => 1,
        ]);

        Student::create([
            'name' => 'Johan Hagman',
            'image_url' => 'logos/default-logo.jpg',
            'website_url' => $faker->url,
            'description' => $faker->paragraph,
            'cv_url' => $faker->url,
            'linkedin_url' => $faker->url,
            'user_id' => 2,
            'class_id' => 2,
        ]);
    }
}
