<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /*
         *  $table->integer('dni')->unique();
            $table->date('fecha de nacimeinto');
            $table->string('procedencia');
            $table->enum('sexo',['M', 'F']);
            $table->enum('tipo',['A', 'B', 'AB', 'O']);
            $table->enum('Rh', ['+', '-']);
            $table->string('cargo');
            $table->integer('telefono');
            $table->string('seguimiento de enfermedades');
            $table->string('medicamentos y dosis');
         * */
        return [
            //
            'nombres'=>fake()->name(),
            'primer_apellido'=>fake()->lastname(),
            'segundo_apellido'=>fake()->lastname(),
            'dni'=>fake()->numerify('#############'),
            'fecha_de_nacimiento'=>fake()->date(),
            'procedencia'=>fake()->text(),
            'sexo'=>fake()->randomElement(['M', 'F']),
            'tipo'=>fake()->randomElement(['A', 'B', 'AB', 'O']),
            'Rh'=>fake()->randomElement(['+', '-',]),
            'cargo'=>fake()->word(),
            'telefono'=>fake()->numerify('########'),
            'enfermedades'=>fake()->sentence,
            'medicamentos'=>fake()->sentence,

        ];
    }
}
