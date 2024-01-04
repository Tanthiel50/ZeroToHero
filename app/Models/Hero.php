<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $table = 'hero';
    protected $with = ['skills', 'univers'];

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'hero_skill', 'hero_id', 'skill_id');
    }
    public function univers()
    {
        return $this->belongsTo(Univers::class, 'univers_id');
    }
}
