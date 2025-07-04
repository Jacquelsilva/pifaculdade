<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('cpf')->primary(); 
            $table->string('nome_usuario');
            $table->date('data_nascimento');
            $table->string('email_usuario')->unique();
            $table->string('senha');
            $table->string('telefone')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
