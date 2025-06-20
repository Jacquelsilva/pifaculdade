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
        Schema::create('assinaturas', function (Blueprint $table) {
            // cria id_assinaturas como BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->id('id_assinaturas');

            $table->string('plataforma', 50);
            $table->decimal('valor_assinatura', 10, 2);
            $table->string('data_pagamento', 10);
            $table->string('data_renovação', 10);
            $table->string('status_assinatura', 8);
            $table->string('plano_assinatura', 10);

            // cria id_categoria como BIGINT UNSIGNED NULLABLE
            $table->foreignId('id_categoria')
                ->nullable()
                ->constrained('categoria', 'id_categoria')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assinaturas');
    }
};
