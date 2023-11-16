<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_of_song extends Model
{
    use HasFactory;
    protected $primaryKey = 'type_id';
    protected $fillable = [
        'type_name'
    ];
}
