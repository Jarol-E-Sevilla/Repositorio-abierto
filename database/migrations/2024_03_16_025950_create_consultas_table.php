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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_visita');
            $table->string('motivo_visita');
            $table->string('atendido');
            //El paciente es:
            $table->enum('tPas', ['n','s']);
            //El paciente se considera:
            $table->enum('considera',
                ['<1mN','<1mS','1ma1aN','1ma1aS','1a4N','1a4S','5a9N','5a9S','10a14N','10a14S','15a19N','15a19S','20a49N','20a49S','50a60N','50a60S','+60N','+60S']);
            //La consulta se consideLa consulta se considera:
            $table->enum('tCon', ['e','r']);
            //Hubo detención de:
            $table->enum('deteccion', ['sr','ccu','ninguno']);
            //En caso de ser embarazo
            $table->enum('eCon', ['econ','n','ninguno']);
            //Control puerpal
            $table->enum('cPu', ['si','no']);
            //Anticonceptivos
            $table->enum('anticonceptivos', ['oral1c','oral3c','oral6c','con10','con30','depo','diu','collar','implanon','ninguno']);
            //En caso de ser niño (1)
            $table->enum('n1', ['<5dN','<5dS','<5des','<5neuN','<5ane','seguimiento','ninguno']);
            //En caso de ser niño (2)
            $table->enum('n2', ['<5creA','<5creI','<5bajo','<5dnutri','<5alter','<5disN','ninguno']);
            //Atención en embarazo
            $table->enum('altEmb', ['12sgN','12sgS','10diasN','10diasS','ninguno']);
            //Diagnosticos
            $table->string('diagnostico1');
            $table->string('diagnostico2')->nullable();
            $table->string('diagnostico3')->nullable();
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade'); // Definir clave foránea
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
