<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    protected $primaryKey = 'id_categoria';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'cpf_usuario',
        'nome_categoria',
        'cor_categoria',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'cpf_usuario', 'cpf');
    }

    public function assinaturas()
    {
        return $this->hasMany(Assinatura::class, 'id_categoria', 'id_categoria');
    }

    public function gastos()
    {
        return $this->hasMany(Gasto::class, 'id_categoria', 'id_categoria');
    }

    public function historicos()
    {
        return $this->hasMany(Historico::class, 'id_categoria', 'id_categoria');
    }

    public function outros()
    {
        return $this->hasMany(Outro::class, 'id_categoria', 'id_categoria');
    }

    public function pagamentos()
    {
        return $this->hasMany(Pagamento::class, 'id_categoria', 'id_categoria');
    }
}