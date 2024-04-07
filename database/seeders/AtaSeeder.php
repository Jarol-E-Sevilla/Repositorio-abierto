<?php

namespace Database\Seeders;

use App\Models\Ata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AtaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Ata::factory()->count(30)->create();
    }
}
