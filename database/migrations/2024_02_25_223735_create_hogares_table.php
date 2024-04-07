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
        Schema::create('hogares', function (Blueprint $table) {
            $table->id();
            /*Informacion del Hogar*/
            /*Características de la vivienda:*/
            $table->enum('techo_con_materiales_de_desecho',['si', 'no']);
            $table->enum('paredes_con_meteriales_de_desechos',['si', 'no']);
            $table->enum('piso_de_tierra',['si', 'no']);
            $table->enum('fogon_sin_chimenea_dentro_de_la_vivienda',['si', 'no']);
            $table->enum('criaderos_de_vectores',['si', 'no']);
            $table->enum('animales_dentro_de_la_vivienda',['si', 'no']);
            /*(para tachar con una x)*/
            $table->enum('abastecimiento_de_agua',['Pozo_publico', 'Pozo_domicilio','Carro_cisterna',
                'Corrientes_superficiales', 'Llave_publica', 'Conexion_o_llave_en_domicilio']);
            $table->enum('agua_para_consumo', ['No_tratado', 'Botellon(agua purificada)',
                'Filtrado', 'Hervida', 'Clorada']);
            $table->enum('eliminacion_de_excretas', ['Letrina_de_foso_simple', 'Inododo_o_servicio_sanitario',
                'Letrina_de_cierre_hidraulico', 'Aire_libre']);
            $table->enum('eliminacion_de_basura',['Tren_de_aseo','La_entierra', 'Quema_de_basura', 'Aire_libre']);
            /*Economico*/
            $table->enum('energia_electrica',['si', 'no']);
            $table->enum('hacinamiento',['si', 'no']);
            $table->enum('beneficiarios',['si', 'no']);
            $table->string('observaciones1')->nullable();
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
        Schema::dropIfExists('hogar');
    }
};
