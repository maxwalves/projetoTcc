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
        Schema::create('avaliacao_clientes', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('formulario_avaliacao_id');
            $table->string('status');
            $table->string('hash');
            $table->timestamps();

            // Define as chaves estrangeiras
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('formulario_avaliacao_id')->references('id')->on('formulario_avaliacoes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacao_clientes');
    }
};
