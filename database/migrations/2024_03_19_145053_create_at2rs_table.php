<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('at2rs', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_de_profecional');
            $table->string('nombre');
            $table->string('consul_ex');
            $table->string('emergencia');
            $table->string('menores_1_1a');
            $table->string('menores_1_sub');
            $table->string('1_a_1_1a_vez');
            $table->string('1_a_1_sub');
            $table->string('1_4_1a');
            $table->string('1_4_sub');
            $table->string('5_9_1a');
            $table->string('5_9_subs');
            $table->string( '10_14_1a');
            $table->string('10_14_anio_sub');
            $table->string('15_19_anios_1a_vez');
            $table->string('15_19_anios_subsiguiente');
            $table->string('20_49_anios_1a_vez');
            $table->string('20_49_anios_subsiguiente');
            $table->string('50_y_mas_anios_1a_vez');
            $table->string('50_59_anios_1a_vez');
            $table->string('50_59_anios_subsiguiente');
            $table->string('60_y_mas_anios_subsiguiente');
            $table->string('total_pacientes_atendidos');
            $table->string('no_atenciones_de_mujeres');
            $table->string('no_atenciones_de_hombres');
            $table->string('no_consultas_expontaneas');
            $table->string('no_consultas_referidas');
            $table->string('controles_puerperales');
            $table->string('sintomaticos_respiratorios');
            $table->string('cancer_cervicouterino');
            $table->string('embarazadas_nuevas');
            $table->string('embarazadas_en_control');
            $table->string('controles_puerperales_2');
            $table->string('anticonceptivo_oral_1_ciclo');
            $table->string('anticonceptivo_oral_3_ciclo');
            $table->string('anticonceptivo_oral_6_ciclo');
            $table->string('condones_10_unidades');
            $table->string('condones_30_unidades');
            $table->string('depo_provera_aplicadas');
            $table->string('diu_insertados');
            $table->string('no_metodo_de_dias_fijos');
            $table->string('implante_subdermico');
            $table->string('no_menores_de_5_con_diarrea');
            $table->string('no_menores_de_5_con_diarrea_seguimiento');
            $table->string('ninos_de_5_rehidratados');
            $table->string('no_menores_de_5_neumonia_nuevos');
            $table->string('seguimiento');
            $table->string('no_menores_5_grado_anemico');
            $table->string('diagnosticado_por_laboratorio');
            $table->string('total_menores_de_5_atendidos');
            $table->string('no_menores_de_5_con_crecimiento_adecuado');
            $table->string('no_menores_de_5_con_crecimiento_inadecuado');
            $table->string('no_menores_5_bajo_percentil_3');
            $table->string('no_menores_de_5_con_dano_nutricional_severo');
            $table->string('no_menores_de_5_con_discapacidad_nuevos_en_el_anio');
            $table->string('no_menores_de_5_con_probable_alteracion_del_desarrollo');
            $table->string('atencion_prenatal_nueva_en_las_primeras_12_sg');
            $table->string('atencion_puerperal_nueva_en_los_10_primeros_dias');
            $table->string('atencion_prenatal_subsiguiente_en_las_primeras_12_sg');
            $table->string('puerperal_sub_10_primeros_dias');
            $table->string('puerperal_nueva_primeros_dias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('at2rs');
    }
};
