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
        /*
Edad en años
Paciente
Departamento donde vive paciente
Municipio donde vive paciente
Localidad donde vive paciente
Diagnostico 1
Condicion 1
Diagnostico 2 (no requerido)
Condicion 2 (no requerido)
Diagnostico 3 (no requerido)
Condicion 3 (no requerido)
Enviada a (no requerido)
Recibida de (no requerido)

Observaciones (no requerido)
         * */
        Schema::create('atas', function (Blueprint $table) {
            $table->id();
            $table->string('establecimiento');
            $table->integer('codigo');
            $table->string('tEstablecimiento');
            $table->string('depto');
            $table->string('municipio');
            $table->string('tprofecional');
            $table->string('nombre');
            $table->date('fecha');
            $table->integer('no');
            $table->integer('noHistoria');
            $table->string('nomApe');
            $table->bigInteger('dni');
            $table->enum('sexo',['M', 'F']);
            $table->date('nacimiento');
            $table->integer('edad');
            $table->string('paciente');
            $table->string('deptoP');
            $table->string('municipioP');
            $table->string('localidad');
            $table->string('diag1');
            $table->enum('cond1',['D','E','G','R']);
            $table->string('diag2')->nullable();
            $table->enum('cond2',['D','E','G','R'])->nullable();
            $table->string('diag3')->nullable();
            $table->enum('cond3',['D','E','G','R'])->nullable();
            $table->string('enviada')->nullable();
            $table->string('recibida')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ata');
    }
};
