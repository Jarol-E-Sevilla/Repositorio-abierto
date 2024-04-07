<?php

namespace Database\Seeders;

use App\Models\Riesgo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RiesgoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Riesgo::factory()->count(30)->create();
    }
}
