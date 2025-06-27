<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Card extends Model
{
    protected $fillable = [
        'descricao', 'color',
    ];

    public function entradas(): HasMany
    {
        return $this->hasMany(Entrada::class);
    }
}
