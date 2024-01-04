<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $table = "playlists";
    protected $primaryKey = "playlist_id";

    protected $fillable = [
        "playlist_name",
        "created_at",
        "updated_at",
        "user_id"
    ];
}
