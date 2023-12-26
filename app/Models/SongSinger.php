<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SongSinger extends Model
{
    use HasFactory;

    protected $table = "song_singers";

    public $timestamps = false;
    
}
