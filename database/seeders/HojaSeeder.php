<?php

namespace Database\Seeders;

use App\Models\Hoja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HojaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Hoja::factory()->count(30)->create();
    }
}
