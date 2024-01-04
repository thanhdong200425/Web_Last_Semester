<?php

namespace Database\Seeders;

use App\Models\PlaylistSong;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaylistSongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        PlaylistSong::factory()->count(10)->create();
    }
}
