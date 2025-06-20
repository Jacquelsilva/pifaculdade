<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Nome da tabela no banco
    protected $table = 'usuarios';

    // Chave primária não-incremental do tipo string
    protected $primaryKey = 'cpf';
    public $incrementing = false;
    protected $keyType = 'string';

    // Colunas que podem ser preenchidas em massa
    protected $fillable = [
        'cpf',
        'nome_usuario',
        'data_nascimento',
        'email_usuario',
        'senha',
        'telefone',
    ];

    // Colunas que não aparecem na serialização (JSON, arrays etc)
    protected $hidden = [
        'senha',
        'remember_token',
    ];

    // Casts para tipos nativos
    protected $casts = [
        // se quiser interpretar data_nascimento como Carbon
        'data_nascimento' => 'date:Y-m-d',
    ];

    /**
     * Laravel espera que o campo de senha seja 'password'.
     * Como aqui é 'senha', precisamos dizer ao framework como obtê-la.
     */
    public function getAuthPassword()
    {
        return $this->senha;
    }

    /**
     * Laravel por padrão usa 'email' para envio de notificações.
     * Aqui sobrescrevemos para usar 'email_usuario'.
     */
    public function routeNotificationForMail($notification)
    {
        return $this->email_usuario;
    }

    public function username(): string
    {
        return 'email_usuario';
    }
}
