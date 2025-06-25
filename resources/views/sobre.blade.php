@extends('layouts.main')

@section('title', 'sobre')

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
      <h1>Sobre Nós</h1>
      <p>Somos uma equipe de estudantes do segundo semestre da Faculdade de Tecnologia de Indaiatuba, unidos pelo interesse comum em desenvolvimento web, inovação e soluções que fazem a diferença. </p>
      <p>O Recora nasceu como parte do nosso projeto de conclusão de semestre e representa o nosso esforço coletivo para aplicar na prática os conhecimentos adquiridos até aqui.</p>

      <h1>Quem somos</h1>
      <p>Durante o desenvolvimento do Recora, trabalhamos em equipe como desenvolvedores, designers e planejadores, cada um contribuindo com suas habilidades e aprendizados. Mesmo em fase de formação, buscamos entregar um produto funcional, intuitivo e com potencial de crescimento.</p>

      <h1> Nosso propósito</h1>
      <p>Criamos o Recora com o objetivo de resolver uma necessidade real por meio da tecnologia. Mais do que uma entrega acadêmica, este projeto representa nosso compromisso com a evolução constante e com a criação de soluções acessíveis, modernas e relevantes.</p>
      
      <p>Obrigado por fazer parte dessa jornada. Este é apenas o começo.</p>
    </div>

    <div class="imagem">
      <img src="{{ asset('img/gruporecorte.jpeg') }}" alt="Foto do grupo lindo" loading="lazy"
      >
    </div>
  </div>
</section>

@endsection