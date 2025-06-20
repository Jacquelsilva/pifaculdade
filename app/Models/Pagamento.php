<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $table = 'pagamentos';
    protected $primaryKey = 'id_pagamento';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'nome_pagamento',
        'valor_pagamento',
        'data_pag_pagamento',
        'data_renovacao_pagamento',
        'status_pagamento',
        'id_categoria',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
    }
}
