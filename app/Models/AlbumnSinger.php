<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumnSinger extends Model
{
    use HasFactory;

    protected $table = "albumn_singers";
    protected $fillable = [
        'albumn_id',
        'singer_id'
    ];

    public $timestamps = false;
}
