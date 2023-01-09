<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioTag extends Model
{
    use HasFactory;

    protected $fillable = ['audio_id', 'tag_name', 'hour','minute', 'second'];

}
