<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\YrgoClass;

class ClassesTableSeeder extends Seeder
{

    public function run()
    {
        YrgoClass::create(['name' => 'Webbutvecklare']);
        YrgoClass::create(['name' => 'Digital Designer']);
    }
}
