<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfSong extends Model
{
    use HasFactory;

    protected $table = 'types_of_song';
    protected $primaryKey = 'type_id';
    protected $fillable = [
        'type_name'
    ];
    public $timestamps = false;
}
