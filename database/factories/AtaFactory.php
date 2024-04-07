<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ata>
 */
class AtaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /* $table->string('establecimiento');
            $table->integer('codigo');
            $table->string('tEstablecimiento');
            $table->string('depto');
            $table->string('municipio');
            $table->string('tprofecional');
            $table->string('nombre');
            $table->dete('fecha');
            $table->string('no');
            $table->string('noHistoria');
            $table->string('nomApe');
            $table->string('dni');
            $table->string('sexo');
            $table->string('nacimiento');
            $table->string('edad');
            $table->string('paciente');
            $table->string('deptoP');
            $table->string('municipioP');
            $table->string('localidad');
            $table->string('diag1');
            $table->string('cond1');
            $table->string('diag2')->nullable();
            $table->string('cond2')->nullable();
            $table->string('diag3')->nullable();
            $table->string('cond3')->nullable();
            $table->string('enviada')->nullable();
            $table->string('recibida')->nullable();*/
        return [
            //
            'establecimiento'=>fake()->lastName,
            'codigo'=>fake()->numerify('####'),
            'tEstablecimiento'=>fake()->word,
            'depto'=>fake()->streetName,
            'municipio'=>fake()->city,
            'tprofecional'=>fake()->word,
            'nombre'=>fake()->firstName,
            'fecha'=>fake()->date,
            'no'=>fake()->randomDigit(),
            'noHistoria'=>fake()->randomDigit(),
            'nomApe'=>fake()->name,
            'dni'=>fake()->numerify('#############'),
            'sexo'=>fake()->randomElement(['M', 'F']),
            'nacimiento'=>fake()->date,
            'edad'=>fake()->numerify('##'),
            'paciente'=>fake()->word,
            'deptoP'=>fake()->city,
            'municipioP'=>fake()->city,
            'localidad'=>fake()->lastName,
            'diag1'=>fake()->sentence,
            'cond1'=>fake()->randomElement(['D','E','G','R']),
            'diag2'=>fake()->sentence,
            'cond2'=>fake()->randomElement(['D','E','G','R']),
            'diag3'=>fake()->sentence,
            'cond3'=>fake()->randomElement(['D','E','G','R']),
            'enviada'=>fake()->word,
            'recibida'=>fake()->word,
        ];
    }
}
