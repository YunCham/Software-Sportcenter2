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
        Schema::create('producto_deporte', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventario_id');
            $table->foreign('inventario_id')->references('id')->on('inventarios');
            $table->unsignedBigInteger('deporte_id');
            $table->foreign('deporte_id')->references('id')->on('deportes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_deporte');
    }
};
