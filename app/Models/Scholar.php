<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholar extends Model
{
    use HasFactory;

    public function audios()
    {
        return $this->hasMany(Audio::class);
    }

    
    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}
