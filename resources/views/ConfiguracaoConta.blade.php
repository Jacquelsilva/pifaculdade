@extends('layouts.dash-container')

@section('title', __('mensagens.config'))

@section('content')

<div class="container-config">
  <div class="header">
    <h2>Configurações</h2>
  </div>

  @if(session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
  @endif

  @if(session('error'))
  <div class="alert alert-error">
      {{ session('error') }}
  </div>
  @endif

  @if($errors->any())
  <div class="alert alert-error">
      <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif

  <form method="POST" action="{{ route('contaconfig.salvarConta') }}" class="form-configuracoes">
    @csrf
    <div class="form-grid">
      <div class="form-group">
        <label for="password">Senha</label>
        <input
          required
          id="password"
          name="password"
          type="password"
          placeholder="Nova senha"
          class="input"
        />
      </div>

      <div class="form-group">
        <label for="password-confirm">Confirmar senha</label>
        <input
          required
          id="password-confirm"
          name="password-confirm"
          type="password"
          placeholder="Confirme a senha"
          class="input"
        />
      </div>
    </div>

    <button type="submit" class="btn-submit">Atualizar</button>
  </form>
</div>

@endsection
