<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function conta()
    {
        // Recupera os valores da sessão (ou define padrões se não existir)
        $configuracao = [
            'tema' => session('configuracao.tema', 'claro'),
            'idioma' => session('configuracao.idioma', 'pt'),
        ];

        // Envia para a view
        return view('ConfiguracaoConta', compact('configuracao'));
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
            'idioma' => $validated['idioma'],
        ]);

        // Redireciona com mensagem de sucesso
        return redirect()->route('contaconfig')->with('success', 'Configurações salvas com sucesso!');
    }
    public function salvarConta(Request $request)
    {
        // Valida os dados recebidos
        $validated = $request->validate([
            'password' => 'required',
            'password-confirm' => 'required',
        ]);

        // Verifica se as senhas coincidem
        if ($validated['password'] !== $validated['password-confirm']) {
            return redirect()->back()->withErrors(['password' => 'As senhas não coincidem.']);
        }

        // Atualiza a senha do usuário autenticado
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Atualiza a senha (campo 'senha' no seu DB)
        $user->senha = Hash::make($validated['password']);
        $user->save();

        // Redireciona com mensagem de sucesso
        return redirect()->route('contaconfig.conta')->with('success', 'Senha atualizada com sucesso!');
    }
}
