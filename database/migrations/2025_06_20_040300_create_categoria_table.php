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
        Schema::create('categoria', function (Blueprint $table) {
            // cria um BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->id('id_categoria');
            $table->string('nome_categoria', 100);
            $table->string('cor_categoria', 50);
            // se você referenciar cpf_usuario, garanta que seja string(14)
            $table->string('cpf_usuario', 14)->nullable();
            // …
            $table->foreign('cpf_usuario')
                ->references('cpf')
                ->on('usuarios')
                ->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria');
    }
};
