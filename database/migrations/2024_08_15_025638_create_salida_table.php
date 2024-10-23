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
        Schema::create('salida', function (Blueprint $table) {
            $table->increments('id');
            $table->text('descripcion');
            $table->integer('cantidad_salida');
            $table->integer('precio_salida');
            $table->integer('estado');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_cliente');
            $table->timestamps();

            /*realizamos la creacion de la llave foranea */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salida');
    }
};
