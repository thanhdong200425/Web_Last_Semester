<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    use HasFactory;
    protected $primaryKey = 'singer_id';
    protected $fillable = [
        'name',
        'dob',
        'short_description',
    ];
}
