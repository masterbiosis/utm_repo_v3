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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('introduccion');
            $table->string('resumen');
            $table->string('fecha_presentacion');
            $table->string('archivo_pdf')->nullable();
            $table->bigInteger('alumno_id')->unsigned();
            $table->bigInteger('asesorempresa_id')->unsigned();
            $table->bigInteger('programa_id')->unsigned();
            $table->bigInteger('directortesis_id')->unsigned();
            $table->timestamps();


            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->foreign('asesorempresa_id')->references('id')->on('asesorempresas');
            $table->foreign('programa_id')->references('id')->on('programas');
            $table->foreign('directortesis_id')->references('id')->on('directortesis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
