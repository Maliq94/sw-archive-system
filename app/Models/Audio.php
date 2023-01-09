<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;
    protected $table = 'audio';

    public function scholar()
    {
        return $this->belongsTo(Scholar::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function fn()
    {
        return $this->belongsTo(Fan::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
