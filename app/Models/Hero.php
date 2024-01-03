<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $table = 'hero';
    use HasFactory;
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'hero_skill', 'hero_id', 'skill_id');
    }
}
