<?php

namespace Database\Seeders;

use App\Models\Albumn;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlbumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Albumn::factory()->count(10)->create();
    }
}
