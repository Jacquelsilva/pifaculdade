<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CadastroController extends Controller
{
    /**
     * Exibe o formulário de cadastro.
     */
    public function index()
    {
        return view('cadastro');
    }

    /**
     * Processa o envio do formulário de cadastro.
     */
    public function store(Request $request)
    {
        // Validação dos campos do formulário
        $request->validate([
            'nome_usuario' => 'required|string|max:50',
            'email_usuario' => 'required|email|unique:usuarios,email_usuario',
            'senha' => 'required|string|min:6|confirmed', // precisa do campo senha_confirmation no form
            'data_nascimento' => 'required|date_format:d/m/Y',
            'cpf' => 'required|string|unique:usuarios,cpf',
            'telefone' => 'required|string',
        ]);

        // Converter a data de nascimento para o formato aceito pelo banco (Y-m-d)
        $dataNascimento = \DateTime::createFromFormat('d/m/Y', $request->data_nascimento);
        if (!$dataNascimento) {
            // Retorna com erro caso o formato esteja inválido
            return back()
                ->withErrors(['data_nascimento' => 'Formato de data inválido, use dd/mm/aaaa'])
                ->withInput();
        }

        // Cria o usuário no banco de dados
        User::create([
            'cpf' => $request->cpf,
            'nome_usuario' => $request->nome_usuario,
            'data_nascimento' => $dataNascimento->format('Y-m-d'),
            'email_usuario' => $request->email_usuario,
            'senha' => Hash::make($request->senha), // encripta a senha para segurança
            'telefone' => $request->telefone,
        ]);

        // Redireciona para a página de login com mensagem de sucesso
        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso!');
    }
}
