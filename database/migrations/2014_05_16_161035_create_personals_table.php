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
    Schema::create('personals', function (Blueprint $table) {
      $table->id();

      $table->string('ci')->unique();
      $table->string('nombre', 45);
      $table->string('apellidos');
      $table->date('fecha_nacimiento');
      $table->string('genero');
      $table->string('telefono', 20);
      $table->string('distrito', 35);
      $table->string('calle');
      $table->integer('n_casa');
      $table->string('cargo')->nullable();
      $table->decimal('salario', 12, 2)->nullable();
      $table->date('fecha_inicio_contrato');
      $table->date('fecha_fin_contrato');
      $table->string('estado')->default('inactivo');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('personals');
  }
};
