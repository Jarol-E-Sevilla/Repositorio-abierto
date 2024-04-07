<?php

namespace Database\Seeders;

use App\Models\At2r;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class At2rSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        At2r::factory()->count(30)->create();
    }
}
