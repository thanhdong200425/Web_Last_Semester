<?php

namespace Database\Seeders;

use App\Models\AlbumnSinger;
use Database\Factories\AlbumnSingerFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlbumnSingerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AlbumnSinger::factory()->count(10)->create();
    }
}
