@extends('layouts.main')

@section('title', 'historico')

@section('content')
<div class="dashboard">
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
      <div class="logout"><a h"><i class="fas fa-sign-out-alt"></i><span>Sair</span></a></div>
    </nav>
  </aside> 

  <div class="container-his">
    <header>
      <h1>Histórico</h1>
    </header>

    <div class="message-card">
      <div class="icon">
        <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M12 22c1.1 0 1.99-.9 1.99-2h-4L10 20c0 1.1.9 2 2 2zm6-6V9c0-3.07-1.63-5.64-4.5-6.32V2
                   c0-.83-.67-1.5-1.5-1.5S10.5 1.17 10.5 2v.68C7.63 3.36 6 5.92 6 9v7l-2 2v1h16v-1l-2-2z"/>
        </svg>
      </div>
      <p>você tem uma nova mensagem: “PRIME venceu no dia xx/xx/xx”</p>
    </div>

    <div class="message-card">
      <div class="icon">
        <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M12 22c1.1 0 1.99-.9 1.99-2h-4L10 20c0 1.1.9 2 2 2zm6-6V9c0-3.07-1.63-5.64-4.5-6.32V2
                   c0-.83-.67-1.5-1.5-1.5S10.5 1.17 10.5 2v.68C7.63 3.36 6 5.92 6 9v7l-2 2v1h16v-1l-2-2z"/>
        </svg>
      </div>
      <p>você tem uma nova mensagem: “Netflix pago no dia xx/xx/xx”</p>
    </div>
  </div>
</div>
@endsection
