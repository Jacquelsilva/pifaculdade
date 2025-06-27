<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

   
    protected $table = 'usuarios';

    
    protected $primaryKey = 'cpf';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'cpf',
        'nome_usuario',
        'data_nascimento',
        'email_usuario',
        'senha',
        'telefone',
    ];

    protected $hidden = [
        'senha',
        'remember_token',
    ];

    protected $casts = [
        
        'data_nascimento' => 'date:Y-m-d',
    ];

   
    public function getAuthPassword()
    {
        return $this->senha;
    }

    
    public function routeNotificationForMail($notification)
    {
        return $this->email_usuario;
    }

    public function username(): string
    {
        return 'email_usuario';
    }
}
