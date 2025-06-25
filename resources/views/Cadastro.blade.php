@extends('layouts.main')

@section('title', 'Cadastro')

@section('content')
<div class="register-wrapper">
  <div class="register-container">
    <!-- Link de retorno -->
    <a href="{{ route('login') }}" class="back-arrow">
      <i class="fas fa-arrow-left"></i> 
    </a>

    <h1>Criar Conta</h1>
    
    <form action="{{ route('cadastro.store') }}" method="POST">
      @csrf

      <!-- Nome Completo -->
      <div class="field">
        <label for="name">Nome Completo:</label>
        <input type="text" id="name" name="nome_usuario" placeholder="Insira seu nome completo" required>
      </div>

      <!-- Email -->
      <div class="field field-with-icon">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email_usuario" placeholder="Insira um email válido" required>
        <i class="field-icon fas fa-envelope"></i>
      </div>

      <!-- Linha com Data de Nascimento e CPF -->
      <div class="row">
        <div class="field field-with-icon">
          <label for="nascimento">Data de nascimento:</label>
          <input type="text" id="nascimento" name="data_nascimento" placeholder="Exemplo: 02/09/1998" required>
          <i class="field-icon fas fa-calendar-alt"></i>
        </div>
        <div class="field field-with-icon">
          <label for="cpf">CPF:</label>
          <input type="text" id="cpf" name="cpf" placeholder="Insira seu CPF válido" required>
          <i class="field-icon fas fa-id-card"></i>
        </div>
      </div>

      <!-- Linha com Senha e Confirmação -->
      <div class="row">
        <div class="field password-field">
          <label for="password">Senha:</label>
          <input type="password" id="password" name="senha" placeholder="Crie sua senha" required>
          <i class="fas fa-eye toggle-password"></i>
        </div>
        <div class="field password-field">
          <label for="password_confirmation">Confirmar senha:</label>
          <input type="password" id="password_confirmation" name="senha_confirmation" placeholder="Confirme sua senha" required>
          <i class="fas fa-eye toggle-password"></i>
        </div>
      </div>

      <!-- Telefone -->
      <div class="field field-with-icon">
        <label for="telefone">Número de telefone:</label>
        <input type="tel" id="telefone" name="telefone" placeholder="Insira seu número de telefone" required>
        <i class="field-icon fas fa-phone"></i>
      </div>

      <button type="submit" class="submit-btn">CADASTRAR-SE</button>
    </form>

  </div>
</div>

<!-- Inclua Font Awesome para os ícones -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
