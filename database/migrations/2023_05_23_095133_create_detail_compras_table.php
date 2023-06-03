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
        Schema::create('detail_compras', function (Blueprint $table) {
            $table->id();
            $table->double('price')->default(0);
            
            $table->integer('quantity')->default(0);

            $table->unsignedBigInteger('compra_id')->nullable();            
            $table->foreign('compra_id')->references('id')->on('compras')->nullOnDelete();           
            
            $table->unsignedBigInteger('detail_product_id')->nullable();            
            $table->foreign('detail_product_id')->references('id')->on('detail_products')->nullOnDelete();
        
            // $table->foreignId('producto_id')->nullable()->constrained('productos')->nullOnDelete();
            // $table->foreignId('nota_compra_id')->onDelete('cascade')->constrained('nota_compras');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_compras');
    }
};
