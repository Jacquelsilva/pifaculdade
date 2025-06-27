<?
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'name', 'color', 'description', 'infos', 'sub_cards',
    ];

    protected $casts = [
        'infos' => 'array',
        'sub_cards' => 'array',
    ];
}
