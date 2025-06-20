<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    protected $table = 'historico';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;

    protected $fillable = [
        'id_categoria',
        'cpf_usuario',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'cpf_usuario', 'cpf');
    }
}
