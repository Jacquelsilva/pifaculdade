<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class CadastroController extends Controller
{
    public function index()
    {
        return view('cadastro');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_usuario' => 'required|string|max:50',
            'email_usuario' => 'required|email|unique:usuarios,email_usuario',
            'senha' => 'required|string|min:6|confirmed',
            'data_nascimento' => 'required|string', // se quiser pode validar regex
            'cpf' => 'required|string|unique:usuarios,cpf',
            'telefone' => 'required|string',
        ]);

        User::create([
            'cpf' => $request->cpf,
            'nome_usuario' => $request->nome_usuario,
            'data_nascimento' => $request->data_nascimento,
            'email_usuario' => $request->email_usuario,
            'senha' => Hash::make($request->senha),
            'telefone' => $request->telefone,
        ]);

        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso!');
    }
}
