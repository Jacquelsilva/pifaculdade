<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContaconfigController extends Controller
{
    public function index()
    {
        // Recupera os valores da sessão (ou define padrões se não existir)
        $configuracao = [
            'tema' => session('configuracao.tema', 'claro'),
            'idioma' => session('configuracao.idioma', 'pt'),
        ];

        // Envia para a view
        return view('contaconfig', compact('configuracao'));
    }

    public function salvar(Request $request)
    {
        // Valida os dados recebidos
        $validated = $request->validate([
            'tema' => 'required|in:claro,escuro',
            'idioma' => 'required|in:pt,en',
        ]);

        // Salva os dados na sessão
        session([
            'configuracao.tema' => $validated['tema'],
            'configuracao.idioma' => $validated['idioma'],
        ]);

        // Redireciona com mensagem de sucesso
        return redirect()->route('contaconfig')->with('success', 'Configurações salvas com sucesso!');
    }
}
