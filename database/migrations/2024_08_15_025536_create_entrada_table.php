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
        Schema::create('entrada', function (Blueprint $table) {
            $table->increments('id');
            $table->text('descripcion');
            $table->integer('cantidad_entrada');
            $table->integer('precio_entrada');
            $table->integer('estado');
            $table->unsignedBigInteger('id_proveedor');
            $table->unsignedBigInteger('id_producto');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrada');
    }
};
