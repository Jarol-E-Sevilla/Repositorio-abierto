<?php

namespace Database\Factories;

use App\Models\Hoja;
use App\Models\Riesgo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Riesgo>
 */
class RiesgoFactory extends Factory
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
    protected $model = Riesgo::class;
    public function definition(): array
    {
        return [
            //
            'evaluacion_del_riesgo_familiar'=>fake()->randomElement(['Grupo_I_de_riesgo','Grupo_II_de_riesgo',
                'Grupo_III_de_riesgo', 'Grupo_IV_de_riesgo']),
            'higienicos_sanitarios'=>fake()->randomElement(['Con_dos_o_mas_condiciones_inadecuadas',
                'Con_una_condición_inadecuada', 'Con_tres_condiciones_inadecuadas', 'Esta_en_condicion_inadecuada']),
            'socio_economico'=>fake()->randomElement(['La_vivienda_tiene_caracteristicas_fisicas_inadecuadas',
                'La_vivienda_tiene_servicios_inadecuados', 'El_hogar_se_encuentra_en_estado_de_hacinamiento_critico',
                'En_el_hogar_existen_niños_que_no_asisten_a_la_escuela', 'el_hogar_tiene_una_alta_dependencia_economica']),
            'Hogar'=>fake()->randomElement(['Hogar_pobre',
                'Hogar_con_extrema_pobreza', 'Ninguno']),
            'observaciones5'=>implode('' ,fake()->sentences(2)),
            'hoja_id' => $this->getUniqueHojaId(),
        ];
    }

    public function configure()
    {
        self::$hojaIds = Hoja::pluck('id')->toArray();
        return $this->afterCreating(function (Riesgo $riesgo) {
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
