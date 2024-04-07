<?php

namespace Database\Factories;

use App\Models\Hoja;
use App\Models\Miembro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MiembroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static $hojaIds;

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Miembro::class;

    public function definition(): array
    {
        return [
            //
            'No'=>fake()->numerify,
            'nombres_y_apellidos'=>fake()->name,
            'No_identidad'=>fake()->numerify('#############'),
            'sexo'=>fake()->randomElement(['M','F']),
            'parentesco'=>fake()->sentence,
            'fecha_de_nacimiento'=>fake()->date,
            'edad'=>fake()->numerify('##'),
            'etnia'=>fake()->sentence,
            'escolaridad'=>fake()->sentence,
            'trabaja_actualmente'=>fake()->randomElement(['si','no']),
            'ocupacion'=>fake()->jobTitle,
            'vacuna_completa'=>fake()->randomElement(['si', 'no']),
            'riesgos'=>implode('' ,fake()->sentences(3)),
            'GR'=>implode('' ,fake()->sentences(2)),
            'PF'=>implode('' ,fake()->sentences(3)),
            'tratamiento_para_enf_cronica'=>fake()->randomElement(['si', 'no']),
            'nombre_del_medicamento_para_enfermedad_cronica'=>fake()->word,
            'observaciones2'=>implode('' ,fake()->sentences(2)),
            'No_dependientes'=>fake()->numerify(),
            'observaciones3'=>implode('' ,fake()->sentences(2)),
            'hoja_id' => $this->getUniqueHojaId(),

        ];
    }

    public function configure()
    {
        self::$hojaIds = Hoja::pluck('id')->toArray();
        return $this->afterCreating(function (Miembro $miembro) {
            // ...
        });
    }

    protected function getUniqueHojaId()
    {
        if (empty(self::$hojaIds)) {
            return null; // No hay más IDs disponibles
        }

        $hojaId = null;
        while (empty($hojaId)) {
            $randomIndex = array_rand(self::$hojaIds);
            $hojaId = self::$hojaIds[$randomIndex];
            unset(self::$hojaIds[$randomIndex]);
        }

        return $hojaId;
    }
}
