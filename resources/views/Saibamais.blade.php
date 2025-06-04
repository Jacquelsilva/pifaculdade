@extends('layouts.main')

@section('title', 'saibamais')

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
      <div class="logout"><a href=""><i class="fas fa-sign-out-alt"></i><span>Sair</span></a></div>
    </nav>
  </aside> 
        <div class="container-status">

    <div class="header">
      <div>Cores do Recora: Como Funciona</div>
    </div>

    <ul class="status-list">
      <li>
        <strong>Verde:</strong> Indica que a assinatura foi paga e está em dia. Tudo está regularizado e não há pendências.
        <div class="pill green">
          <span>NETFLIX</span>
          <span>R$39,99</span>
          <span>12/06/2025</span>
        </div>
      </li>

      <li>
        <strong>Azul:</strong> Aparece quando a assinatura está pendente de pagamento, ou seja, o pagamento está próximo de ser realizado ou ainda não foi efetuado.
        <div class="pill blue">
          <span>SPOTIFY</span>
          <span>R$11,99</span>
          <span>16/04/2025</span>
        </div>
      </li>

      <li>
        <strong>Vermelho:</strong> Significa que a data de vencimento já passou e o pagamento não foi realizado.
        <div class="pill red">
          <span>PRIME</span>
          <span>R$9,99</span>
          <span>12/04/2025</span>
        </div>
        </div>
      </li>
    </ul>
  </div>

@endsection 

