<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    /*

1. Techo con materiales de desecho: sí /no.
2. Paredes con meteriales de desechos: sí /no
3. Piso de tierra: sí /no
Fogón sin chimenea dentro de la vivienda: sí /no.
4. Criaderos de vectores: sí /no.
5. Animales dentro de la vivienda: sí /no.

Abastecimiento de agua. (para tachar con una x)
1.Pozo publico.
2. Pozo domicilio.
3. Carro cisterna.
4. Corrientes superficiales.
5. Llave pública.
6. Conexión o llave en domicilio.

Agua para consumo
1. No tratado.
2. Botellón (agua purificada).
3. Filtrado.
4. Hervida.
5. Clorada.

Eliminación de excretas
1. Letrina de foso simple.
2. Inododo o servicio sanitario.
3. Letrina de cierre hidráulico.
4. Aire libre.

Eliminación de basura
1. Tren de aseo.
2. La entierra.
3. Quema de basura.
4. Aire libre.


     * */
    public function up(): void
    {
        Schema::create('hojas', function (Blueprint $table) {
            $table->id();
            /*Datos del Encabezado*/
            $table->string('nombre_del_entrevistador');
            $table->date('fecha_de_entrevista');
            $table->integer('codigo');
            $table->integer('region_sanitaria');
            $table->string('establecimiento_de_salud_sede_del_equipo');
            $table->string('sector');
            /*Datos Generales*/
            $table->string('numero_de_identidad_del_jefe_de_la_casa');
            $table->string('numero_de_celular_o_fijo');
            $table->string('nombre_completo_del_jefe_de_la_familia');
            $table->enum('estado_civil', ['Soltero', 'Casado', 'Union Libre']);
            $table->integer('numero_de_vivienda');
            $table->string('Aldea_Caserio_Barrio_Colonia');
            $table->string('referencia_vecinal');
            $table->enum('area', ['Urbana', 'Rural']);
            $table->string('municipio');
            /*Distancia y tiempo para llegar al establecimiento de Salud más cercan*/
            $table->string('distancia_en_kilometros');
            $table->string('horas');
            $table->string('minutos');
            $table->string('nombre_del_establecimiento_mas_cercano');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hojas');
    }
};
