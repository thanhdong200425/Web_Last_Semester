<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SongSinger;

class SongSingerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SongSinger::factory()->count(10)->create();
    }
}
