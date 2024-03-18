<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   /* public function up(): void
    {
         Schema::create('médicos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('especialidade');
            $table->integer('CRM');
            $table->timestamps();
        });

        Schema::create('consultas_medico', function (Blueprint $table) {
            $table->id();
            $table->string('data');
            $table->date('dia');
            $table->time('horario');
            $table->unsignedBigInteger('médicos_id')->after('id');
            $table->foreign('médicos_id')->references('id')->on('médicos');
            $table->timestamps();
        });

        Schema::create('paciente', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('NIF');
            $table->string('email');
            $table->timestamps();
        });

        Schema::create('consultas_paciente', function (Blueprint $table) {
            $table->id();
            $table->string('data');
            $table->date('dia');
            $table->time('horario');
            $table->unsignedBigInteger('paciente_id')->after('id');
            $table->foreign('paciente_id')->references('id')->on('paciente');
            $table->timestamps();
        });
    } */

    /**
     * Reverse the migrations.
     */
   /*  public function down(): void
    {
        Schema::dropIfExists('médicos');
        Schema::dropIfExists('consultas_medico');
        Schema::dropIfExists('paciente');
        Schema::dropIfExists('consultas_paciente');
    } */
};
