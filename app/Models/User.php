<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios'; // nome da tabela

    protected $primaryKey = 'cpf'; // chave primária

    public $incrementing = false; // cpf não é auto-increment

    protected $keyType = 'string'; // chave é string

    protected $fillable = [
        'cpf',
        'nome_usuario',
        'data_nascimento',
        'email_usuario',
        'senha',
        'telefone',
    ];

    protected $hidden = ['senha']; // oculta senha nas respostas JSON

    public $timestamps = false; // sua tabela não tem created_at, updated_at

    // Se quiser usar autenticação Laravel, defina:
    public function getAuthPassword()
    {
        return $this->senha; // campo senha no seu banco
    }
}
