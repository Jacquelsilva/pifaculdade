@extends('layouts.main')

@section('title', 'Recora')

@section('content') 
<div class="container">
    <aside class="sidebar">
    <div class="menu-toggle"><i class="fas fa-bars"></i></div>
    <nav>
      <ul>
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i><span>Home</span></a></li>
        <li><a href="{{ route('historico') }}"><i class="fas fa-history"></i><span>Histórico</span></a></li>        
        <li><a href="{{ route('configuracao') }}"><i class="fas fa-cog"></i><span>Configuração</span></a></li>
        <li><a href="{{ route('Dashboard') }}"><i class="fas fa-info-circle"></i><span>Relatórios</span></a></li> 
        <li><a href="{{ route('saibamais') }}"><i class="fas fa-info-circle"></i><span>Saiba mais</span></a></li>         
      </ul>
      <div class="logout"><a href="{{ route('sair') }}"><i class="fas fa-sign-out-alt"></i><span>Sair</span>
  </a>
</div>

    </nav>
  </aside> 

    <div class="config-container">
        <h1>Configurações</h1>
        <div class="settings">
            <div class="setting-option">
                <h2>Conta</h2>
                <p>Gerenciar informações da sua conta</p>
                <button>Editar Conta</button>
            </div>
            <div class="setting-option">
                <h2>Notificação</h2>
                <p>Configurar preferências de notificação</p>
                <button>Editar Notificações</button>
            </div>
            <div class="setting-option">
                <h2>Tema</h2>
                <p>Escolher tema de exibição</p>
                <button>Alterar Tema</button>
            </div>
            <div class="setting-option">
                <h2>Suporte</h2>
                <p>Obter ajuda e suporte</p>
                <button>Ir para Suporte</button>
            </div>
        </div>
    </div>
</div>
@endsection
