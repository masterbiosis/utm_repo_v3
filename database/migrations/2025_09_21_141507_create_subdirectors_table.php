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
        Schema::create('subdirectors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('app');
            $table->string('apm')->nullable()->default();
            $table->string('email');
            $table->string('telefono');
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
        Schema::dropIfExists('subdirectors');
    }
};
