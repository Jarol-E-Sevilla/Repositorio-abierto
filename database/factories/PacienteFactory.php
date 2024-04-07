<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /*
         * $table->date('fecha de visita');
            $table->string('motivo de consulta')
        */
        return [
            //
            'nombres'=>fake()->name(),
            'primer_apellido'=>fake()->lastname(),
            'segundo_apellido'=>fake()->lastname(),
            'dni'=>fake()->numerify('#############'),
            'fecha_de_nacimiento'=>fake()->date(),
            'expediente'=>fake()->numerify('######'),
            'temperatura'=>fake()->sentence(5),
            'sexo'=>fake()->randomElement(['M', 'F']),
            'peso'=>fake()->sentence(5),
            'presion_arterial'=>fake()->sentence(5),
        ];
    }
}
