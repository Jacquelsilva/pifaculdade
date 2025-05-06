<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function destroy(Request $request)
    {
        // Logout do usuário
        Auth::logout();

        // Redireciona para a página de login após o logout
        return redirect()->route('login');
    }
}
