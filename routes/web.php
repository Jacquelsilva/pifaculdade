<?php

use Illuminate\Support\Facades\Route;

// Site
use App\Http\Controllers\Site\SaibamaisController;
use App\Http\Controllers\Site\DashboardController;
use App\Http\Controllers\Site\CadastroController;
use App\Http\Controllers\Site\InicioController;
use App\Http\Controllers\Site\HistoricoController;
use App\Http\Controllers\Site\ContaconfigController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Auth
use App\Http\Controllers\Auth\LoginController;

// Admin
use App\Http\Controllers\Admin\ConfiguracaoController;

// Rotas

// Dashboard
Route::get('/Dashboard', [DashboardController::class, 'index'])->name('Dashboard');

// Página "Saiba Mais"
Route::get('/saibamais', [SaibamaisController::class, 'index'])->name('saibamais');

// Página de login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

// Página de cadastro
Route::get('/cadastro', [CadastroController::class, 'index'])->name('cadastro');

// Botoes de configuracao
Route::get('/contaconfig', [ContaconfigController::class, 'index'])->name('contaconfig');


// Página de histórico
Route::get('/historico', [HistoricoController::class, 'index'])->name('historico');

// Página principal (Home)
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Página de configurações
Route::get('/configuracao', [ConfiguracaoController::class, 'index'])->name('configuracao');

// Página de logout - Confirmação de logout
Route::get('/sair', function () {
    return view('auth.sair');
})->name('sair');

// Rota para realmente fazer o logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Página de início
Route::get('/inicio', [InicioController::class, 'index'])->name('inicio');
