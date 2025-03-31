<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'Student']);
        Role::create(['name' => 'Företag']);
    }
}
