<?php

namespace Database\Seeders;

use App\Models\Mortalidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MortalidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mortalidade::factory()->count(30)->create();
    }
}
