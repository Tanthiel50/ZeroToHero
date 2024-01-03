<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\univers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UniversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        univers::factory(20)->create();
    }
}
