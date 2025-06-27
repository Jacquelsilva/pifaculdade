@extends('layouts.main')

@section('title', 'recursos')

@section('content')

<nav class="navbar" aria-label="Navegação principal">
  <div class="logo">
  <p>
  <img src="{{ asset('img/logonovomenor.png') }}" alt="Ícone do Recora" width="15" height="15">
  </p>
</div>
</nav>
 
<section class="hero" aria-labelledby="hero-heading">
  <div class="container"> <!-- aqui, container que controla o layout flex -->
    <div class="texto hero-text"> <!-- coloque a classe texto junto com hero-text -->
      <h1>Recursos</h1>
      <p>Conheça as principais funcionalidades e benefícios que o nosso produto oferece para você ou sua empresa.</p>
      <div class="card-recursos">
        <ul>
          <li>Funcionalidade A - Automatização de processos</li>
          <li>Funcionalidade B - Relatórios personalizados</li>
          <li>Funcionalidade C - Integração com plataformas populares</li>
        </ul>
      </div>
    </div>
</section>
@endsection

@section('footer')
<!-- Footer -->
<footer class="footer" aria-label="Rodapé">
  <div class="footer-content">
    <div class="footer-links">
      <div class="footer-col">
        <h4>Produto</h4>
        <a href="/recursos">Recursos</a>
        <a href="/planos">Planos</a>
        <a href="/app">Aplicativo</a>
      </div>
      <div class="footer-col">
        <h4>Empresa</h4>
        <a href="/sobre">Sobre nós</a>
        <a href="/contato">Contato</a>
      </div>
      <div class="footer-col">
        <h4>Legal</h4>
        <a href="/privacidade">Privacidade</a>
        <a href="/termos">Termos</a>
      </div>
    </div>
  </div>


  <!-- Botão flutuante -->
<a href="/cadastro" class="cta-flutuante" aria-label="Comece agora">
  <i class="bi bi-plus-lg" aria-hidden="true"></i>
  <span>Comece agora</span>
</a>

<a href="/inicio" class="cta-flutuante voltar" aria-label="Voltar para o início">
  <i class="bi bi-arrow-left" aria-hidden="true"></i>
  <span>Voltar ao Início</span>
</a>
@endsection