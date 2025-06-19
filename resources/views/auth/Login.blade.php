@extends('layouts.main', ['hideFooter' => true])

@section('title', 'Login')

@section('content')
<div class="login-page">
<div class="container-login">
    <div class="left-side">
        <div class="text-container">
            <h1>Organize suas assinaturas e contas com Recora!</h1>
            <p>Cadastre-se agora e evite cobranças desnecessárias!</p>
        </div>
        <img src="{{ asset('img/logobranco.png') }}" alt="Logo">
    </div>

    <div class="rigth-side">
        <div class="form-box">
            <h2>LOGIN</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="email" name="email" placeholder="E-mail" required>
                <input type="password" name="password" placeholder="Senha" required>
                <button type="submit">Entrar</button>
            </form>

            <p>ou</p>
            <button class="google-btn">
                <i class="fab fa-google"></i> Entrar com Google
            </button>

            <p class="register-link">
                Ainda não tem uma conta? <a href="{{ route('cadastro') }}">Cadastre-se</a>
            </p>
        </div>
    </div>
</div>
</div>
@endsection
