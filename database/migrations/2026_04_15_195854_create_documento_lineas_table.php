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
        Schema::create('documento_lineas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('documento_id')->unsigned();
            $table->bigInteger('lineas_id')->unsigned();
            $table->timestamps();

            $table->foreign('documento_id')->references('id')->on('documentos');
            $table->foreign('lineas_id')->references('id')->on('lineas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documento_lineas');
    }
};
