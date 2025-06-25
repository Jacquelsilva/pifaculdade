@extends('layouts.main')

@section('title', 'termos')

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
      <h1>Termos de Uso</h1>
      <p>Ao utilizar nosso serviço, você concorda com os seguintes termos:</p>
        <div class="card-termos">
            <ol>
                <li>Você deve usar o serviço de forma legal e ética.</li>
                <li>Não é permitido tentar explorar falhas ou vulnerabilidades.</li>
                <li>Reservamo-nos o direito de encerrar contas em caso de uso indevido.</li>
             </ol>
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
  <div class="footer-newsletter">
    <h4>Receba dicas de economia</h4>
    <form action="/newsletter" method="POST">
      @csrf
      <label for="newsletter-email" class="visually-hidden">Seu melhor e-mail</label>
      <input type="email" id="newsletter-email" name="email" placeholder="Seu melhor e-mail" required>
      <button type="submit">Assinar</button>
    </form>
  </div>
  <div class="footer-copyright">
    <p>© 2025 Recora. Todos os direitos reservados.</p>
    <div class="footer-social">
      <a href="#" aria-label="Facebook"><i class="bi bi-facebook" aria-hidden="true"></i></a>
      <a href="#" aria-label="Instagram"><i class="bi bi-instagram" aria-hidden="true"></i></a>
      <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin" aria-hidden="true"></i><a>
    </div>
  </div>
</footer>
@endsection