<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumnSong extends Model
{
    use HasFactory;

    protected $table = "albumn_songs";
    protected $fillable = [
        'albumn_id',
        'song_id'
    ];

    public $timestamps = false;
}
