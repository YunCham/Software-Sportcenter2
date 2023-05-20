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
        Schema::create('membresia_servicio', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('membresia_id');
            $table->unsignedBigInteger('servicio_id');

            $table->foreign('membresia_id')
            ->references('id')
            ->on('membresias')
            ->onDelete('cascade');

            $table->foreign('servicio_id')
            ->references('id')
            ->on('servicios')
            ->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membresia_servicio');
    }
};
