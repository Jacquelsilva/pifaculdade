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
