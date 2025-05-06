@extends('layouts.main')

@section('title', 'Sair')

@section('content')
<a href="{{ route('home') }}" class="back-arrow"><i class="fas fa-arrow-left"></i></a>
<div class="container-sair">
  <div class="right-side">
    <div class="logout-box">
      <h2>Você está saindo</h2>
      <p>Tem certeza que deseja encerrar sua sessão?</p>
      <div class="button-group">
        <!-- Formulário POST para logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf  <!-- Token CSRF -->
            <button type="submit" class="logout-btn">Sair</button>
        </form>
        <a href="{{ route('home') }}" class="cancel-btn">Cancelar</a>
      </div>
    </div>
  </div>
</div>
@endsection
