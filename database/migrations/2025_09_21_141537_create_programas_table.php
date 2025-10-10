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
        Schema::create('programas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->bigInteger('carrera_id')->unsigned();
            $table->timestamps();

            //LLaves foraneas
            $table->foreign('carrera_id')->references('id')->on('carreras');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programas');
    }
};
