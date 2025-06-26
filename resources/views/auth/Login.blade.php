@extends('layouts.main', ['hideFooter' => true])

@section('title', 'Login')

@section('content')
<div class="login-page">
    <div class="container-login">
        <!-- Lado Esquerdo -->
        <div class="left-side">
            <div class="text-container">
                <h1>Organize suas assinaturas e contas com Recora!</h1>
                <p>Cadastre-se agora e evite cobranças desnecessárias!</p>
            </div>
            <img src="{{ asset('img/logonovomenor.png') }}" alt="Logo">
        </div>

        <!-- Lado Direito -->
        <div class="right-side">
            <div class="form-box">
                <h2>Login</h2>

                {{-- Mensagem de erro genérico --}}
                @if(session('error'))
                <div class="p-4 mb-4 bg-red-100 text-red-800 rounded">
                    {{ session('error') }}
                </div>
                @endif

                {{-- Erros de validação --}}
                @if($errors->any())
                <div class="p-4 mb-4 bg-red-100 text-red-800 rounded">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('logar') }}">
                    @csrf
                    <input type="email" name="email" placeholder="E-mail" required>
                    <input type="password" name="password" placeholder="Senha" required>
                    <button type="submit">Entrar</button>
                </form>

                <p class = "opcao">ou</p>
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
