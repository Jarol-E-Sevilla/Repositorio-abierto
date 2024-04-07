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
        Schema::create('mortalidades', function (Blueprint $table) {
            $table->id();
            /*Mortalidad en el último año*/
            $table->string('no_mortalidad')->nullable();
            $table->string('nombre_y_apellido')->nullable();
            $table->string('edad_mortalidad')->nullable();
            $table->string('causa')->nullable();
            $table->string('observaciones4')->nullable();
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
        Schema::dropIfExists('mortalidad');
    }
};
