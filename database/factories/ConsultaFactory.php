<?php

namespace Database\Factories;

use App\Models\Consulta;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consulta>
 */
class ConsultaFactory extends Factory
{
    private static $pacienteIds;

    protected $model = Consulta::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'fecha_visita'=>fake()->date,
            'motivo_visita'=>fake()->sentence,
            'atendido'=>fake()->name,
            'paciente_id' => $this->getUniquePacienteId(),
            //El paciente es:
            'tPas'=>fake()->randomElement(['n','s']),
            //El paciente se considera:
            'considera'=>fake()->randomElement(['<1mN','<1mS','1ma1aN','1ma1aS','1a4N','1a4S','5a9N','5a9S','10a14N','10a14S','15a19N','15a19S','20a49N','20a49S','50a60N','50a60S','+60N','+60S']),
            //La consulta se consideLa consulta se considera:
            'tCon'=>fake()->randomElement(['e','r']),
            //Hubo detención de:
            'deteccion'=>fake()->randomElement(['sr','ccu','ninguno']),
            //En caso de ser embarazo
            'eCon'=>fake()->randomElement(['econ','n','ninguno']),
            //Control puerpal
            'cPu'=>fake()->randomElement(['si','no']),
            //Anticonceptivos
            'anticonceptivos'=>fake()->randomElement(['oral1c','oral3c','oral6c','con10','con30','depo','diu','collar','implanon','ninguno']),
            //En caso de ser niño (1)
            'n1'=>fake()->randomElement(['<5dN','<5dS','<5des','<5neuN','<5ane','seguimiento','ninguno']),
            //En caso de ser niño (2)
            'n2'=>fake()->randomElement(['<5creA','<5creI','<5bajo','<5dnutri','<5alter','<5disN','ninguno']),
            //Atención en embarazo
            'altEmb'=>fake()->randomElement(['12sgN','12sgS','10diasN','10diasS','ninguno']),
            //Diadnosticos
            'diagnostico1'=>fake()->sentence,
            'diagnostico2'=>fake()->sentence,
            'diagnostico3'=>fake()->sentence,

        ];
    }
    // Método para obtener un id único de paciente
    protected function getUniquePacienteId()
    {
        // Obtener todos los ids de pacientes
        $pacienteIds = Paciente::pluck('id');

        // Seleccionar un id aleatorio de la colección
        return $pacienteIds->random();
    }
}
