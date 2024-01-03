<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hero;
use App\Models\Skill;

class HeroSkillSeeder extends Seeder
{
    public function run()
    {
        $heroes = Hero::all();
        $skills = Skill::all();

        foreach ($heroes as $hero) {
            $assignedSkills = $skills->random(rand(1, 3)); 
            $hero->skills()->attach($assignedSkills);
        }
    }
}
