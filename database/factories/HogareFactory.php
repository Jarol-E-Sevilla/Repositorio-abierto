<?php

namespace Database\Factories;

use App\Models\Hogare;
use App\Models\Hoja;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HogareFactory extends Factory
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
    protected $model = Hogare::class;
    public function definition(): array
    {
        return [
            //
            'techo_con_materiales_de_desecho'=>fake()->randomElement(['si', 'no']),
            'paredes_con_meteriales_de_desechos'=>fake()->randomElement(['si', 'no']),
            'piso_de_tierra'=>fake()->randomElement(['si', 'no']),
            'fogon_sin_chimenea_dentro_de_la_vivienda'=>fake()->randomElement(['si', 'no']),
            'criaderos_de_vectores'=>fake()->randomElement(['si', 'no']),
            'animales_dentro_de_la_vivienda'=>fake()->randomElement(['si', 'no']),
            'abastecimiento_de_agua'=>fake()->randomElement(['Pozo_publico', 'Pozo_domicilio','Carro_cisterna',
                'Corrientes_superficiales', 'Llave_publica', 'Conexion_o_llave_en_domicilio']),
            'agua_para_consumo'=>fake()->randomElement(['No_tratado', 'Botellon(agua purificada)',
                'Filtrado', 'Hervida', 'Clorada']),
            'eliminacion_de_excretas'=>fake()->randomElement(['Letrina_de_foso_simple', 'Inododo_o_servicio_sanitario',
                'Letrina_de_cierre_hidraulico', 'Aire_libre']),
            'eliminacion_de_basura'=>fake()->randomElement(['Tren_de_aseo','La_entierra', 'Quema_de_basura', 'Aire_libre']),
            'energia_electrica'=>fake()->randomElement(['si', 'no']),
            'hacinamiento'=>fake()->randomElement(['si', 'no']),
            'beneficiarios'=>fake()->randomElement(['si', 'no']),
            'observaciones1'=>implode('' ,fake()->sentences(2)),
            'hoja_id' => $this->getUniqueHojaId(),
        ];
    }

    public function configure()
    {
        self::$hojaIds = Hoja::pluck('id')->toArray();
        return $this->afterCreating(function (Hogare $hogare) {
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
