@extends('layouts.main')

@section('title', 'contato')

@section('content')

<nav class="navbar" aria-label="Navegação principal">
  <div class="logo">
    <p>
      <img src="{{ asset('img/logonovomenor.png') }}" alt="Ícone do Recora" width="15" height="15">
    </p>
  </div>
</nav>

<section class="hero" aria-labelledby="hero-heading">
  <div class="container">
    <div class="texto hero-text">
      <h1 id="hero-heading">Contate-nos</h1>
      <p>Estamos sempre abertos a sugestões, dúvidas ou parcerias. 
        Entre em contato direto com os membros da equipe:</p>
        
        <div class="card-contato">
        <ul>
          <li><i class="fas fa-envelope"></i> <strong>Bárbara Helena P. Brandino</strong> – b.brandino@recora.com</li>
        <li><i class="fas fa-envelope"></i> <strong>Clara Vecchio M. da Silva</strong> – c.vecchio@recora.com</li>
        <li><i class="fas fa-envelope"></i> <strong>Erika A. Creatto</strong> – e.creatto@recora.com</li>
        <li><i class="fas fa-envelope"></i> <strong>Felipe F. de França</strong> – f.franca@recora.com</li>
        <li><i class="fas fa-envelope"></i> <strong>Jacqueline L. da Silva</strong> – j.leite@recora.com</li>
        <li><i class="fas fa-envelope"></i> <strong>Matheus H. de C. Rumão</strong> – m.rumao@recora.com</li>
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


</footer>
@endsection
