@extends('layouts.main')

@section('title', 'planos')

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
        <h1>Planos</h1>
        <p>Oferecemos planos que se adequam as suas necessidades!</p>
        <p>Experimente 1 mês gratuito!</p>
        <p>Depois, escolha entre os planos:</p>
        <div class="planos-grid">
            <div class="plano">
                <h3>Plano A</h3>
                
                <ul>
                    <li><span aria-hidden="true">✓</span> Ainda em Desenvolvimento</li>
                </ul>
                <a href="/cadastro" class="btn">Plano A</a>
            </div>
            <div class="plano destaque">
                <div class="badge-recomendado">Recomendado</div>
                    <h3>Plano B</h3>
                    <ul>
                    <li><span aria-hidden="true">✓</span> Ainda em desenvolvimento</li>
                    </ul>
                    <a href="/cadastro" class="btn btn-premium">Plano B</a>
                </div>
            </div>
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