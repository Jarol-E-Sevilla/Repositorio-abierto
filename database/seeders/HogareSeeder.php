<?php

namespace Database\Seeders;

use App\Models\Hogare;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HogareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hogare::factory()->count(30)->create();
    }
}
