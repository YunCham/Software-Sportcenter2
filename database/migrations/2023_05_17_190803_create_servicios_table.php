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
    Schema::create('servicios', function (Blueprint $table) {
      $table->id();
      $table->string('nombre', 55)->unique(); ///evaluar si sera unico o nel
      $table->time('duracion');
      $table->decimal('precio',12,2);
      $table->boolean('estado')->default(false);
      $table->text('descripcion')->nullable();

      $table->bigInteger('tservicio_id')->unsigned()->nullable();
      $table->foreign('tservicio_id')
        ->references('id')
        ->on('tservicios')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('servicios');
  }
};
