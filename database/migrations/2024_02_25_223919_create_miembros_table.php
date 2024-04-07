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
        Schema::create('miembros', function (Blueprint $table) {
            $table->id();
            /*INFORMACIÓN DE MIEMBROS DE LA FAMILIA*/
            $table->integer('No');
            $table->string('nombres_y_apellidos');
            $table->string('No_identidad')->unique();
            $table->enum('sexo', ['M','F']);
            $table->string('parentesco');
            $table->date('fecha_de_nacimiento');
            $table->integer('edad');
            $table->string('etnia');
            $table->string('escolaridad');
            $table->enum('trabaja_actualmente', ['si','no']);
            $table->string('ocupacion');
            $table->enum('vacuna_completa', ['si', 'no']);
            $table->string('riesgos');
            $table->string('GR');
            $table->string('PF');
            $table->enum('tratamiento_para_enf_cronica', ['si', 'no']);
            $table->string('nombre_del_medicamento_para_enfermedad_cronica');
            $table->string('observaciones2')->nullable();
            $table->integer('No_dependientes');
            $table->string('observaciones3');
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
        Schema::dropIfExists('miembros');
    }
};
