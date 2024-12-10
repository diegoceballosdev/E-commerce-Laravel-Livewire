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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            //Datos del comprador: 
            $table->string('buyer_name');
            $table->string('buyer_surname');
            $table->integer('buyer_dni');
            $table->integer('buyer_tel');

            // Contenido deL carrito de compras:
            $table->json('products');   
            
            //Datos de Envio
            $table->json('shipping_address');  
            $table->string('shipping_status')->default('PENDIENTE');

            //Datos del pago
            $table->string('payment_method')->default('Tarjeta');
            $table->float('payment_total');

            $table->string('order_status')->default('PENDIENTE');
            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
