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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->String('nombres');
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->string('dni')->unique();
            $table->date('fecha_de_nacimiento');
            $table->string('procedencia');
            $table->enum('sexo',['M', 'F']);
            $table->enum('tipo',['A', 'B', 'AB', 'O']);
            $table->enum('Rh', ['+', '-']);
            $table->string('cargo');
            $table->integer('telefono');
            $table->string('enfermedades');
            $table->string('medicamentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
