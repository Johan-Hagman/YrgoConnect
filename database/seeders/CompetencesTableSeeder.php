<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Competence;

class CompetencesTableSeeder extends Seeder
{
    public function run()
    {
        Competence::create(['name' => 'Motion', 'class_id' => 2]);
        Competence::create(['name' => 'UX/UI', 'class_id' => 2]);
        Competence::create(['name' => '3D', 'class_id' => 2]);
        Competence::create(['name' => 'Webflow/Framer', 'class_id' => 2]);
        Competence::create(['name' => 'Branding', 'class_id' => 2]);
        Competence::create(['name' => 'Content Creation', 'class_id' => 2]);
        Competence::create(['name' => 'Fullstack', 'class_id' => 1]);
        Competence::create(['name' => 'Frontend', 'class_id' => 1]);
        Competence::create(['name' => 'Backend', 'class_id' => 1]);
    }
}
