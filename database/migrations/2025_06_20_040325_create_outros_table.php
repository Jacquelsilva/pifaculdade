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
        Schema::create('outros', function (Blueprint $table) {
            $table->id('id_outros');
            $table->string('nome_outros', 50);
            $table->string('data_pag_outros', 10);
            $table->decimal('valor_outros', 10, 2);
            $table->string('data_renovacao_outros', 10)->nullable();
            $table->string('status_outros', 8);
            $table->string('plano_outros', 10);

            $table->foreignId('id_categoria')->nullable()
                  ->constrained('categoria', 'id_categoria')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outros');
    }
};
