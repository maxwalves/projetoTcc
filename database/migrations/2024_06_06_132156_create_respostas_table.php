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
        Schema::create('respostas', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->unsignedBigInteger('campo_id');
            $table->unsignedBigInteger('avaliacao_cliente_id');
            $table->string('resposta');
            $table->timestamps();

            // Define as chaves estrangeiras
            $table->foreign('campo_id')->references('id')->on('campos')->onDelete('cascade');
            $table->foreign('avaliacao_cliente_id')->references('id')->on('avaliacao_clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respostas');
    }
};
