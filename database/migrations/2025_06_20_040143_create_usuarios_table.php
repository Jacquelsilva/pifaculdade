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
          Schema::create('usuarios', function (Blueprint $table) {
            // aqui definimos o CPF como chave primária
            $table->string('cpf', 14)->primary();
            $table->string('nome_usuario', 50);
            $table->string('data_nascimento', 10);
            $table->string('email_usuario', 50)->unique();
            $table->string('senha', 60);
            $table->string('telefone', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
