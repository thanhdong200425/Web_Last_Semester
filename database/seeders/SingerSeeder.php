<?php

namespace Database\Seeders;

use App\Models\Singer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SingerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Singer::factory()->count(20)->create();
    }
}
