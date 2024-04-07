<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\At2r;
use App\Models\Miembro;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(HojaSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(PacienteSeeder::class);
        $this->call(MiembroSeeder::class);
        $this->call(RiesgoSeeder::class);
        $this->call(HogareSeeder::class);
        $this->call(MortalidadeSeeder::class);
        $this->call(MedicamentoSeeder::class);
        $this->call(ConsultaSeeder::class);
        $this->call(At2rSeeder::class);
        $this->call(RecetaSeeder::class);
        $this->call(AtaSeeder::class);
    }
}
