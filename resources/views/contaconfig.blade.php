@extends('layouts.main')

@section('title', __('mensagens.config'))

@section('content')
<div class="dashboard">
  <aside class="sidebar">
    <div class="menu-toggle"><i class="fas fa-bars"></i></div>
    <nav>
      <ul>
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i><span>{{ __('mensagens.home') }}</span></a></li>
        <li><a href="{{ route('historico') }}"><i class="fas fa-history"></i><span>{{ __('mensagens.historico') }}</span></a></li>
        <li><a href="{{ route('contaconfig') }}"><i class="fas fa-cog"></i><span>{{ __('mensagens.config') }}</span></a></li>
        <li><a href="{{ route('dashboard') }}"><i class="fas fa-info-circle"></i><span>{{ __('mensagens.dashboard') }}</span></a></li>
        <li><a href="{{ route('saibamais') }}"><i class="fas fa-info-circle"></i><span>{{ __('mensagens.saiba_mais') }}</span></a></li>
      </ul>

      <div class="logout">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" style="background: none; border: none; color: inherit; padding: 0; display: flex; align-items: center;">
            <i class="fas fa-sign-out-alt"></i>
            <span style="margin-left: 5px;">{{ __('mensagens.sair') }}</span>
          </button>
        </form>
      </div>
    </nav>
  </aside>

  <main class="main-content" style="padding: 2rem;">
    @if(session('success'))
  <div style="padding: 1rem; background: #d4edda; color: #155724; border-radius: 4px; margin-bottom: 1rem;">
    {{ session('success') }}
  </div>
@endif

    <form method="POST" action="{{ route('contaconfig.salvar') }}" class="form-configuracoes">
      @csrf
      <div id="configuracoes">
        <h2>{{ __('mensagens.configuracoes') }}</h2>

        <div class="form-group">
          <label for="toggleTema">{{ __('mensagens.tema') }}:</label>
          <select id="toggleTema" name="tema">
            <option value="claro" {{ ($configuracao['tema'] ?? 'claro') == 'claro' ? 'selected' : '' }}>
              {{ __('mensagens.claro') }}
            </option>
            <option value="escuro" {{ ($configuracao['tema'] ?? '') == 'escuro' ? 'selected' : '' }}>
              {{ __('mensagens.escuro') }}
            </option>
          </select>
        </div>

        <div class="form-group">
          <label for="selectIdioma">{{ __('mensagens.idioma') }}:</label>
          <select id="selectIdioma" name="idioma">
            <option value="pt" {{ ($configuracao['idioma'] ?? 'pt') == 'pt' ? 'selected' : '' }}>
              {{ __('mensagens.portugues') }}
            </option>
            <option value="en" {{ ($configuracao['idioma'] ?? '') == 'en' ? 'selected' : '' }}>
              {{ __('mensagens.ingles') }}
            </option>
          </select>
        </div>

        <button type="submit" class="btn-salvar">{{ __('mensagens.salvar') }}</button>
      </div>
    </form>
  </main>
</div>
@endsection
