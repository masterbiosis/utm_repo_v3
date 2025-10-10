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
        Schema::create('lineas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->bigInteger('programa_id')->unsigned();
            $table->string('descripcion');
            $table->timestamps();

            $table->foreign('programa_id')->references('id')->on('programas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lineas');
    }
};
