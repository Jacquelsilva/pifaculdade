@extends('layouts.dash-container')

@section('title', 'Recora')

@section('content')
<div class="container mx-auto px-4 py-8">
  <!-- Cabeçalho -->
  <div class="text-center mb-12">
    <h2 class="text-4xl font-extrabold tracking-tight" style="color: var(--texto);">
      {{ __('mensagens.preferencias') ?? 'Configurações' }}
    </h2>
    <p class="mt-2 text-lg sm:text-xl" style="color: var(--texto);">
      Personalize sua experiência: escolha tema, idioma e notificações com apenas um clique.
    </p>
  </div>

  <!-- Cartões de configuração -->
  <div class="space-y-6">
    <!-- Conta -->
    <div class="bg-[var(--bg)] rounded-2xl p-6 shadow-md flex justify-between items-start">
      <div>
        <h3 class="text-xl font-semibold text-[var(--texto)]">Conta</h3>
        <p class="mt-1 text-sm" style="color: var(--texto);">
          Gerenciar informações da sua conta
        </p>
      </div>
      <a
        href="{{ route('contaconfig.conta') }}"
        class="bg-[var(--primaria)] text-[var(--texto-botao)] px-5 py-2 rounded-lg shadow hover:bg-[var(--secundaria)] transition-colors duration-150">
        Editar Conta
      </a>
    </div>

    <!-- Preferências -->
    <div class="bg-[var(--bg)] rounded-2xl p-6 shadow-md flex justify-between items-start">
      <div>
        <h3 class="text-xl font-semibold text-[var(--texto)]">Preferências</h3>
        <p class="mt-1 text-sm" style="color: var(--texto);">
          Configurar preferências de tema e idioma
        </p>
      </div>
      <a
        href="{{ route('contaconfig') }}"
        class="bg-[var(--primaria)] text-[var(--texto-botao)] px-5 py-2 rounded-lg shadow hover:bg-[var(--secundaria)] transition-colors duration-150">
        Editar Preferências
      </a>
    </div>

    <!-- Suporte -->
    <div class="bg-[var(--bg)] rounded-2xl p-6 shadow-md flex justify-between items-start">
      <div>
        <h3 class="text-xl font-semibold text-[var(--texto)]">Suporte</h3>
        <p class="mt-1 text-sm" style="color: var(--texto);">
          Obter ajuda e suporte
        </p>
      </div>
      <a
        href="#"
        class="bg-[var(--primaria)] text-[var(--texto-botao)] px-5 py-2 rounded-lg shadow hover:bg-[var(--secundaria)] transition-colors duration-150">
        Ir para suporte
      </a>
    </div>
  </div>
</div>
@endsection
