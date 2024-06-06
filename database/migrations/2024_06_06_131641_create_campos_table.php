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
        Schema::create('campos', function (Blueprint $table) {
            $table->id();
            $table->string('pergunta');
            $table->unsignedBigInteger('formulario_avaliacao_id');
            $table->timestamps();

            // Define a chave estrangeira
            $table->foreign('formulario_avaliacao_id')->references('id')->on('formulario_avaliacoes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campos');
    }
};
