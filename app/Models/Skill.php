<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skill';
    use HasFactory;

    public function heroes()
    {
        return $this->belongsToMany(Hero::class, 'hero_skill', 'skill_id', 'hero_id');
    }
}
