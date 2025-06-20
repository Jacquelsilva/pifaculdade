<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outro extends Model
{
    protected $table = 'outros';
    protected $primaryKey = 'id_outros';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'nome_outros',
        'data_pag_outros',
        'valor_outros',
        'data_renovacao_outros',
        'status_outros',
        'plano_outros',
        'id_categoria',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
    }
}
