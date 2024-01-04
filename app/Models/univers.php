<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class univers extends Model
{
    use HasFactory;
    
    public function heroes()
    {
        return $this->hasMany(Hero::class, 'univers_id');
    }
}
