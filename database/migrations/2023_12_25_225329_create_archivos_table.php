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
        Schema::create('archivos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('ruta_archivo');
            $table->float('size', 8, 2);
            $table->unsignedBigInteger('id_carpeta')->nullable();
            $table->unsignedBigInteger('id_oficina')->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->foreignUuid('id_carpeta')->references('id')->on('folders');
            $table->foreign('id_usuario')->references('id')->on('users');

            $table->foreign('id_oficina')->references('id')->on('ofices');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivos');
    }
};
