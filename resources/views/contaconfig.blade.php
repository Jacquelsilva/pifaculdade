@extends('layouts.dash-container')

@section('title', __('mensagens.config'))

@section('content')
<div class="container-config">
<div class="grid">

  <div class="max-w-screen-md mb-8 lg:mb-16">
    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-[var(--texto)]">{{ __('mensagens.preferencias') }}</h2>
    <p class="mt-2 text-lg sm:text-xl" style="color: var(--texto);">
      Personalize sua experiência: escolha tema, idioma e notificações com apenas um clique.
    </p>
  </div>

  @if(session('success'))
  <div style="padding: 1rem; background: #d4edda; color: #155724; border-radius: 4px; margin-bottom: 1rem;">
    {{ session('success') }}
  </div>
  @endif

  <div class="bg-[var(--bg)] rounded-md p-5 shadow flex justify-between items-start">
    <form method="POST" action="{{ route('contaconfig.salvar') }}" class="form-configuracoes w-full">
      @csrf
      <div id="configuracoes" class="space-y-4">
        <div class="grid grid-cols-2 gap-4">
          <div class="w-full">
            <label for="toggleTema" class="block text-[var(--texto)] text-lg mb-1">
              {{ __('mensagens.tema') }}:
            </label>
            <select
            required
              id="toggleTema"
              name="tema"
              class="
        block w-full
        mt-4
        bg-[var(--fundo)]
        text-[var(--texto)]
        border border-[var(--borda)]
        rounded-md
        py-2 px-3
        focus:outline-none focus:ring-2 focus:ring-[var(--primaria)] focus:border-[var(--primaria)]
        transition-colors duration-150
      ">
              <option value="claro" {{ ($configuracao['tema'] ?? 'claro') == 'claro' ? 'selected' : '' }}>
                {{ __('mensagens.claro') }}
              </option>
              <option value="escuro" {{ ($configuracao['tema'] ?? '') == 'escuro' ? 'selected' : '' }}>
                {{ __('mensagens.escuro') }}
              </option>
            </select>
          </div>

          <div class="w-full">
            <label for="selectIdioma" class="block text-[var(--texto)] text-lg mb-1">
              {{ __('mensagens.idioma') }}:
            </label>
            <select
            required
              id="selectIdioma"
              name="idioma"
              class="
        block w-full
        mt-4
        bg-[var(--fundo)]
        text-[var(--texto)]
        border border-[var(--borda)]
        rounded-md
        py-2 px-3
        focus:outline-none focus:ring-2 focus:ring-[var(--primaria)] focus:border-[var(--primaria)]
        transition-colors duration-150
      ">
              <option value="pt" {{ ($configuracao['idioma'] ?? 'pt') == 'pt' ? 'selected' : '' }}>
                {{ __('mensagens.portugues') }}
              </option>
              <option value="en" {{ ($configuracao['idioma'] ?? '') == 'en' ? 'selected' : '' }}>
                {{ __('mensagens.ingles') }}
              </option>
            </select>
          </div>
        </div>

        <button
          type="submit"
          class="cursor-pointer
          mt-3
      bg-[var(--primaria)]
      text-[var(--texto-botao)]
      px-4 py-2
      rounded-md
      shadow
      hover:bg-[var(--secundaria)]
      transition-colors duration-150 ease-in-out
    ">
          {{ __('mensagens.salvar') }}
        </button>
      </div>
    </form>
  </div>



</div>
@endsection