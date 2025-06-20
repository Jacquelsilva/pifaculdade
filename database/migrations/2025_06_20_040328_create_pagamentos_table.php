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
          Schema::create('pagamentos', function (Blueprint $table) {
            $table->id('id_pagamento');
            $table->string('nome_pagamento', 50);
            $table->decimal('valor_pagamento', 10, 2);
            $table->string('data_pag_pagamento', 10);
            $table->string('data_renovacao_pagamento', 10)->nullable();
            $table->string('status_pagamento', 8);

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
        Schema::dropIfExists('pagamentos');
    }
};
