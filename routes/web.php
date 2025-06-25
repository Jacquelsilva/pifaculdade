<?php

use Illuminate\Support\Facades\Route;


// Site Controllers
use App\Http\Controllers\Site\SaibamaisController;
use App\Http\Controllers\Site\DashboardController;
use App\Http\Controllers\Site\CadastroController;
use App\Http\Controllers\Site\InicioController;
use App\Http\Controllers\Site\HistoricoController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ContaconfigController;
use App\Http\Controllers\RecursosController;
use App\Http\Controllers\PlanosController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PrivacidadeController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\TermosController;

// Auth Controllers
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Admin Controllers
use App\Http\Controllers\Admin\ConfiguracaoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rotas públicas
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/inicio', [InicioController::class, 'index'])->name('inicio');
Route::get('/saibamais', [SaibamaisController::class, 'index'])->name('saibamais');

Route::get('/cadastro', [CadastroController::class, 'index'])->name('cadastro');
Route::post('/cadastro', [CadastroController::class, 'store'])->name('cadastro.store');

Route::get('/home', [App\Http\Controllers\Site\HomeController::class, 'index'])->name('home');
Route::get('/sair', function () {
    return view('auth.sair');
})->name('sair');

Route::get('/recursos', [RecursosController::class, 'index'])->name('recursos');
Route::get('/planos', [PlanosController::class, 'index'])->name('planos');
Route::get('/app', [AppController::class, 'index'])->name('app');
Route::get('/sobre', [SobreController::class, 'index'])->name('sobre');
Route::get('/contato', [ContatoController::class, 'index'])->name('contato');
Route::get('/privacidade', [PrivacidadeController::class, 'index'])->name('privacidade');
Route::get('/termos', [TermosController::class, 'index'])->name('termos');

// Rotas de autenticação
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Rotas protegidas
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/historico', [HistoricoController::class, 'index'])->name('historico');
Route::get('/contaconfig', [ContaconfigController::class, 'index'])->name('contaconfig');
Route::post('/contaconfig/salvar', [ContaconfigController::class, 'salvar'])->name('contaconfig.salvar');

// Rotas admin
Route::get('/configuracao', [ConfiguracaoController::class, 'index'])->name('configuracao');

//redireciona para a rota /home
Route::get('/', function () {
    return redirect('/home');  
});

