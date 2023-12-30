<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albumn extends Model
{
    use HasFactory;
    protected $primaryKey = 'albumn_id';
    protected $fillable = [
        'albumn_name',
        'number_songs', 
        'short_description',
        'cover_photo'
    ];
}
