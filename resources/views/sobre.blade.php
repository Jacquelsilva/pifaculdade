@extends('layouts.main')

@section('title', 'Recursos')

@section('content')

<nav class="navbar" aria-label="Navegação principal">
  <div class="logo">
  <p>
  <img src="{{ asset('img/logonovomenor.png') }}" alt="Ícone do Recora" width="15" height="15">
  </p>
</div>

<section class="hero" aria-labelledby="hero-heading">
  <div class="hero-text">
    <h1 id="hero-heading">Sobre Nós</h1>
    <p>Somos uma equipe de estudantes do segundo semestre da Faculdade de Tecnologia, unidos pelo interesse comum em desenvolvimento web, inovação e soluções que fazem a diferença. O Recora nasceu como parte do nosso projeto de conclusão de semestre, e representa o nosso esforço coletivo para aplicar na prática os conhecimentos adquiridos até aqui.
    Quem somos
    Durante o desenvolvimento do Recora, trabalhamos em equipe como desenvolvedores, designers e planejadores, cada um contribuindo com suas habilidades e aprendizados. Mesmo em fase de formação, buscamos entregar um produto funcional, intuitivo e com potencial de crescimento.
    Nosso propósito
    Criamos o Recora com o objetivo de resolver uma necessidade real por meio da tecnologia. Mais do que uma entrega acadêmica, este projeto representa nosso compromisso com a evolução constante e com a criação de soluções acessíveis, modernas e relevantes.
    Obrigado por fazer parte dessa jornada. Este é apenas o começo.</p>

  </div>
  <div class="hero-img">
    <img src="{{ asset('img/grupo.jpeg') }}" alt="Foto do grupo lindo" loading="lazy"
    style="max-width: 1100px; width: 500%; height: auto;">
</div>
  
  </div>
</section>


@endsection