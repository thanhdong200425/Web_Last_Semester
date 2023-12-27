<?php

namespace Database\Seeders;

use App\Models\AlbumnSong;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlbumnSongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AlbumnSong::factory()->count(10)->create();
    }
}
