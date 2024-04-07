<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\At2r>
 */
class At2rFactory extends Factory
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
            'tipo_de_profecional'=>$this->faker->words(3,1),
            'nombre'=>$this->faker->name(),
            'consul_ex'=>$this->faker->words(1, 2),
            'emergencia' =>$this->faker->words(1, 2),
            'menores_1_1a' => $this->faker->numberBetween(1, 99),
            'menores_1_sub' => $this->faker->numberBetween(1, 99),
            '1_a_1_1a_vez' => $this->faker->numberBetween(1, 99),
            '1_a_1_sub' => $this->faker->numberBetween(1, 99),
            '1_4_1a' => $this->faker->numberBetween(1, 99),
            '1_4_sub' => $this->faker->numberBetween(1, 99),
            '5_9_1a' => $this->faker->numberBetween(1, 99),
            '5_9_subs' => $this->faker->numberBetween(1, 99),
            '10_14_1a' => $this->faker->numberBetween(1, 99),
            '10_14_anio_sub' => $this->faker->numberBetween(1, 99),
            '15_19_anios_1a_vez' => $this->faker->numberBetween(1, 99),
            '15_19_anios_subsiguiente' => $this->faker->numberBetween(1, 99),
            '20_49_anios_1a_vez' => $this->faker->numberBetween(1, 99),
            '20_49_anios_subsiguiente' => $this->faker->numberBetween(1, 99),
            '50_y_mas_anios_1a_vez' => $this->faker->numberBetween(1, 99),
            '50_59_anios_1a_vez' => $this->faker->numberBetween(1, 99),
            '50_59_anios_subsiguiente' => $this->faker->numberBetween(1, 99),
            '60_y_mas_anios_subsiguiente' => $this->faker->numberBetween(1, 99),
            'total_pacientes_atendidos' => $this->faker->numberBetween(1, 99),
            'no_atenciones_de_mujeres' => $this->faker->numberBetween(1, 99),
            'no_atenciones_de_hombres' => $this->faker->numberBetween(1, 99),
            'no_consultas_expontaneas' => $this->faker->numberBetween(1, 99),
            'no_consultas_referidas' => $this->faker->numberBetween(1, 99),
            'controles_puerperales' => $this->faker->numberBetween(1, 99),
            'sintomaticos_respiratorios' => $this->faker->numberBetween(1, 99),
            'cancer_cervicouterino' => $this->faker->numberBetween(1, 99),
            'embarazadas_nuevas' => $this->faker->numberBetween(1, 99),
            'embarazadas_en_control' => $this->faker->numberBetween(1, 99),
            'controles_puerperales_2' => $this->faker->numberBetween(1, 99),
            'anticonceptivo_oral_1_ciclo' => $this->faker->numberBetween(1, 99),
            'anticonceptivo_oral_3_ciclo' => $this->faker->numberBetween(1, 99),
            'anticonceptivo_oral_6_ciclo' => $this->faker->numberBetween(1, 99),
            'condones_10_unidades' => $this->faker->numberBetween(1, 99),
            'condones_30_unidades' => $this->faker->numberBetween(1, 99),
            'depo_provera_aplicadas' => $this->faker->numberBetween(1, 99),
            'diu_insertados' => $this->faker->numberBetween(1, 99),
            'no_metodo_de_dias_fijos' => $this->faker->numberBetween(1, 99),
            'implante_subdermico' => $this->faker->numberBetween(1, 99),
            'no_menores_de_5_con_diarrea' => $this->faker->numberBetween(1, 99),
            'no_menores_de_5_con_diarrea_seguimiento' => $this->faker->numberBetween(1, 99),
            'ninos_de_5_rehidratados' => $this->faker->numberBetween(1, 99),
            'no_menores_de_5_neumonia_nuevos' => $this->faker->numberBetween(1, 99),
            'seguimiento' => $this->faker->numberBetween(1, 99),
            'no_menores_5_grado_anemico' => $this->faker->numberBetween(1, 99),
            'diagnosticado_por_laboratorio' => $this->faker->numberBetween(1, 99),
            'total_menores_de_5_atendidos' => $this->faker->numberBetween(1, 99),
            'no_menores_de_5_con_crecimiento_adecuado' => $this->faker->numberBetween(1, 99),
            'no_menores_de_5_con_crecimiento_inadecuado' => $this->faker->numberBetween(1, 99),
            'no_menores_5_bajo_percentil_3' => $this->faker->numberBetween(1, 99),
            'no_menores_de_5_con_dano_nutricional_severo' => $this->faker->numberBetween(1, 99),
            'no_menores_de_5_con_discapacidad_nuevos_en_el_anio' => $this->faker->numberBetween(1, 99),
            'no_menores_de_5_con_probable_alteracion_del_desarrollo' => $this->faker->numberBetween(1, 99),
            'atencion_prenatal_nueva_en_las_primeras_12_sg' => $this->faker->numberBetween(1, 99),
            'atencion_puerperal_nueva_en_los_10_primeros_dias' => $this->faker->numberBetween(1, 99),
            'atencion_prenatal_subsiguiente_en_las_primeras_12_sg' => $this->faker->numberBetween(1, 99),
            'puerperal_sub_10_primeros_dias' => $this->faker->numberBetween(1, 99),
            'puerperal_nueva_primeros_dias' => $this->faker->numberBetween(1, 99),
        ];
    }
}
