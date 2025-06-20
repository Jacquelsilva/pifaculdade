<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
    /**
     * Exibe o formulário de login
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Realiza o logout
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    /**
     * Realiza o login
     */
    public function logar(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Debug
        // $user = User::where('email_usuario', $credentials['email'])->first();

        // 2) Se existir, faça um dd() para ver o que está chegando
        // if ($user) {
        //     // Isto vai derrubar a execução e mostrar:
        //     // - a senha em texto plano que o usuário digitou
        //     // - o hash que está salvo no banco
        //     dd([
        //         'senha_digitada' => $credentials['password'],
        //         'hash_do_bd'     => $user->senha,
        //         'verifica_hash'  => Hash::check($credentials['password'], $user->senha),
        //     ]);
        // }

        // $remember = $request->has('remember');
        if (Auth::attempt([
            'email_usuario' => $credentials['email'],
            'password'      => $credentials['password'],
        ], true)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        // Autenticação falhou
        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
            ]);
    }
}
