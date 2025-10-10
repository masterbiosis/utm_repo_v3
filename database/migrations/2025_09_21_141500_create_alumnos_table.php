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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('matricula');
            $table->string('nombre');
            $table->string('apellidop');
            $table->string('apellidom');
            $table->string('email');
            $table->string('telefono');
            $table->bigInteger('directortesi_id')->unsigned()->default(1);
            $table->string('estado')->default('pendiente');
            $table->timestamps();


            $table->foreign('directortesi_id')->references('id')->on('directortesis');
            //$table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
