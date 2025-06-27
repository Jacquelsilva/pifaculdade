<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Entrada;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
  
public function index()
{
    $cards = Card::with('entradas')->get();
    return response()->json($cards);
}


    /**
     * Salva múltiplos cards com entradas.
     */
    public function storeLote(Request $request)
    {
        $data = $request->validate([
            'cards' => 'required|array',
            'cards.*.descricao' => 'required|string|max:255',
            'cards.*.color' => 'required|string|max:20',
            'cards.*.entradas' => 'required|array|min:1',
            'cards.*.entradas.*.mes' => 'required|string|max:20',
            'cards.*.entradas.*.valor' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {
            foreach ($data['cards'] as $cardData) {
                $card = Card::create([
                    'descricao' => $cardData['descricao'],
                    'color' => $cardData['color'],
                ]);

                foreach ($cardData['entradas'] as $entradaData) {
                    $card->entradas()->create([
                        'mes' => $entradaData['mes'],
                        'valor' => $entradaData['valor'],
                    ]);
                }
            }

            DB::commit();

            return response()->json(['message' => 'Cards salvos com sucesso!'], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['error' => 'Erro ao salvar os cards.', 'details' => $e->getMessage()], 500);
        }
    }
}
