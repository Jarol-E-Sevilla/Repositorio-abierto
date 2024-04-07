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
        Schema::create('riesgos', function (Blueprint $table) {
            $table->id();
            /*(para tachar con una x)*/
            $table->enum('evaluacion_del_riesgo_familiar', ['Grupo_I_de_riesgo','Grupo_II_de_riesgo',
                'Grupo_III_de_riesgo', 'Grupo_IV_de_riesgo']);
            $table->enum('higienicos_sanitarios', ['Con_dos_o_mas_condiciones_inadecuadas',
                'Con_una_condicion_inadecuada', 'Con_tres_condiciones_inadecuadas', 'Esta_en_condicion_inadecuada']);
            $table->enum('socio_economico', ['La_vivienda_tiene_caracteristicas_fisicas_inadecuadas',
                'La_vivienda_tiene_servicios_inadecuados', 'El_hogar_se_encuentra_en_estado_de_hacinamiento_critico',
                'En_el_hogar_existen_niños_que_no_asisten_a_la_escuela', 'el_hogar_tiene_una_alta_dependencia_economica']);
            $table->enum('Hogar', ['Hogar_pobre',
                'Hogar_con_extrema_pobreza', 'Ninguno']);
            $table->string('observaciones5')->nullable();
            $table->unsignedBigInteger('hoja_id')->unique();
            $table->foreign('hoja_id')->references('id')->on('hojas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riesgos');
    }
};
