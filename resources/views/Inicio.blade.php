@extends('layouts.main')

@section('title', 'Início')

@section('content')


<nav class="navbar">
  <div class="logo">
    <img src="{{ asset('img/logo.png') }}" alt="Logo Recora">
  </div>
  <ul class="nav-links">
    <li>
      <a href="/ajuda">
        <i class="bi bi-question-circle"></i>
        ajuda
      </a>
    </li>
    <li>
      <a href="/login">
        <i class="bi bi-person"></i>
        entrar
      </a>
    </li>
  </ul>
</nav>
<!-- Apresentação -->
<section class="hero">
    <div class="hero-text">
        <h1>Organize suas Assinaturas com Recora</h1>
        <p>Somos especialistas em ajudar você a controlar suas contas e evitar gastos desnecessários.</p>
        <a href="/cadastro" class="btn">Cadastre-se agora</a>
    </div>
    <div class="hero-img">
        <img src="{{ asset('img/boa.png') }}" alt="Boas-vindas">
    </div>
</section>

<!-- Seção de Benefícios / Marketing -->
<section class="marketing">
    <div class="container">
        <h2>Por que usar a Recora?</h2>
        <div class="benefits">
            <div class="benefit">
                <i class="bi bi-wallet2"></i>
                <h3>Economia Real</h3>
                <p>Reduza seus gastos ao eliminar assinaturas esquecidas e desnecessárias.</p>
            </div>
            <div class="benefit">
                <i class="bi bi-clock-history"></i>
                <h3>Gestão Inteligente</h3>
                <p>Tenha controle total do vencimento e valor de cada assinatura.</p>
            </div>
            <div class="benefit">
                <i class="bi bi-shield-check"></i>
                <h3>Segurança e Praticidade</h3>
                <p>Ambiente seguro para você cadastrar e acompanhar suas despesas.</p>
            </div>
        </div>
    </div>
</section>

@endsection
