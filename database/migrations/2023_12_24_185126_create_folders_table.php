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
        Schema::create('folders', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('id_propietario')->nullable();
            $table->unsignedBigInteger('id_oficina')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('id_propietario')->references('id')->on('users');
            $table->foreign('id_oficina')->references('id')->on('ofices');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('folders');
    }
};
