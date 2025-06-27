<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;

class CardController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'color' => 'required|string|max:10',
            'description' => 'nullable|string|max:1000',
            'infos' => 'nullable|array',
            'infos.*.month' => 'required|string',
            'infos.*.value' => 'required|numeric',
            'subCards' => 'nullable|array',
            'subCards.*.name' => 'required|string|max:100',
            'subCards.*.description' => 'nullable|string|max:500',
            'subCards.*.infos' => 'nullable|array',
            'subCards.*.infos.*.month' => 'required|string',
            'subCards.*.infos.*.value' => 'required|numeric',
        ]);

        $card = Card::create([
            'name' => $data['name'],
            'color' => $data['color'],
            'description' => $data['description'] ?? '',
            'infos' => $data['infos'] ?? [],
            'sub_cards' => $data['subCards'] ?? [],
        ]);

        return response()->json(['success' => true, 'card' => $card]);
    }

    public function update(Request $request, $id)
    {
        $card = Card::findOrFail($id);

        $data = $request->validate([
            'description' => 'nullable|string|max:1000',
            'infos' => 'nullable|array',
            'infos.*.month' => 'required|string',
            'infos.*.value' => 'required|numeric',
            'subCards' => 'nullable|array',
            'subCards.*.name' => 'required|string|max:100',
            'subCards.*.description' => 'nullable|string|max:500',
            'subCards.*.infos' => 'nullable|array',
            'subCards.*.infos.*.month' => 'required|string',
            'subCards.*.infos.*.value' => 'required|numeric',
        ]);

        $card->update([
            'description' => $data['description'] ?? '',
            'infos' => $data['infos'] ?? [],
            'sub_cards' => $data['subCards'] ?? [],
        ]);

        return response()->json(['success' => true]);
    }

    public function index()
    {
        return Card::all(); // Exibe todos os cards
    }
}
