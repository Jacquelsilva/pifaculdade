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
            <img src="{{ asset('img/logologin.png') }}" alt="Logo">
        </div>

        <div class="rigth-side bg-[var(--bg)]">
            <div class="form-box">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-[var(--texto)]">Login</h2>

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
                    <input class="
        block w-full
        mt-4
        bg-[var(--fundo)]
        text-[var(--texto)]
        border border-[var(--borda)]
        rounded-md
        py-2 px-3
        focus:outline-none focus:ring-2 focus:ring-[var(--primaria)] focus:border-[var(--primaria)]
        transition-colors duration-150
      " type="email" name="email" placeholder="E-mail" required>

                    <input class="
        block w-full
        mt-4
        bg-[var(--fundo)]
        text-[var(--texto)]
        border border-[var(--borda)]
        rounded-md
        py-2 px-3
        focus:outline-none focus:ring-2 focus:ring-[var(--primaria)] focus:border-[var(--primaria)]
        transition-colors duration-150
      " type="password" name="password" placeholder="Senha" required>
                    <button type="submit">Entrar</button>
                </form>

                <p>ou</p>
                <button class="google-btn">
                    <i class="fab fa-google"></i> Entrar com Google
                </button>

                <p class="register-link text-[var(--texto)]">
                    Ainda não tem uma conta ? <a href="{{ route('cadastro') }}"> <span class="pl-2">Cadastre-se</ class="pl-2"></a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection