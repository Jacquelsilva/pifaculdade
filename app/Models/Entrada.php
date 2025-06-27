<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Entrada extends Model
{
    protected $fillable = [
        'card_id', 'mes', 'valor',
    ];

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }
}
