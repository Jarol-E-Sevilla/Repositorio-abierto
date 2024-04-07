<?php

namespace Database\Factories;

use App\Models\Hoja;
use App\Models\Mortalidade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mortalidade>
 */
class MortalidadeFactory extends Factory
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
    protected $model = Mortalidade::class;
    public function definition(): array
    {
        return [
            //
            'no_mortalidad'=>fake()->numerify('#'),
            'nombre_y_apellido'=>fake()->name,
            'edad_mortalidad'=>fake()->word,
            'causa'=>implode('' ,fake()->sentences(2)),
            'observaciones4'=>implode('' ,fake()->sentences(2)),
            'hoja_id' => $this->getUniqueHojaId(),
        ];
    }
    public function configure()
    {
        self::$hojaIds = Hoja::pluck('id')->toArray();
        return $this->afterCreating(function (Mortalidade $mortalidade) {
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
