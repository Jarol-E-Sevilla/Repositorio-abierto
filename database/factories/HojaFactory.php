<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hoja>
 */
class HojaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nombre_del_entrevistador'=>fake()->name,
            'fecha_de_entrevista'=>fake()->date('Y-m-d', '2030-12-31'),
            'codigo'=>fake()->numerify('####'),
            'region_sanitaria'=>fake()->numerify('####'),
            'establecimiento_de_salud_sede_del_equipo'=>fake()->city(),
            'sector'=>fake()->word,
            'numero_de_identidad_del_jefe_de_la_casa'=>fake()->numerify('############'),
            'numero_de_celular_o_fijo'=>fake()->numerify('########'),
            'nombre_completo_del_jefe_de_la_familia'=>fake()->name,
            'estado_civil'=>fake()->randomElement(['Soltero', 'Casado', 'Union Libre']),
            'numero_de_vivienda'=>fake()->randomDigitNotNull,
            'Aldea_Caserio_Barrio_Colonia'=>implode('' ,fake()->sentences(2)),
            'referencia_vecinal'=>fake()->name,
            'area'=>fake()->randomElement(['Urbana', 'Rural']),
            'municipio'=>fake()->city,
            'distancia_en_kilometros'=>fake()->numberBetween(1, 200),
            'horas'=>fake()->time,
            'minutos'=>fake()->time,
            'nombre_del_establecimiento_mas_cercano'=>fake()->name,
            ];
    }
}
