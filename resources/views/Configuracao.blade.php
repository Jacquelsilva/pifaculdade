@extends('layouts.dash-container')

@section('title', 'Recora')

@section('content')

<div class="grid">
    <div class="max-w-screen-md mb-8 lg:mb-16">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-[var(--texto)]">Configurações</h2>
        <p class="text-gray-500 sm:text-xl dark:text-gray-400">
            Personalize sua experiência: escolha tema, idioma e notificações com apenas um clique.
        </p>
    </div>

    <!-- Conteúdo -->
    <div class="bg-[var(--fundo)] space-y-6">
        <!-- Seção: Conta -->
        <div class="bg-[var(--bg)] rounded-md p-5 shadow flex justify-between items-start">
            <div>
                <h2 class="text-lg font-medium text-[var(--texto)]">Conta</h2>
                <p class="mt-1 text text-gray-400">
                    Gerenciar informações da sua conta
                </p>
            </div>
            <a
                href="{{route('contaconfig.conta')}}"
                class="bg-[var(--primaria)] text-[var(--texto-botao)]
                 px-4 py-2 rounded-md shadow
                 hover:bg-[var(--secundaria)]
                 transition-colors duration-150">
                Editar Conta
            </a>
        </div>

        <!-- Seção: Notificação -->
        <div class="bg-[var(--bg)] rounded-md p-5 shadow flex justify-between items-start">
            <div>
                <h2 class="text-lg font-medium text-[var(--texto)]">Preferencias</h2>
                <p class="mt-1 text text-gray-400">
                    Configurar preferências de tema e idioma
                </p>
            </div>
            <a
                href="{{route('contaconfig')}}"
                class="bg-[var(--primaria)] text-[var(--texto-botao)]
                 px-4 py-2 rounded-md shadow
                 hover:bg-[var(--secundaria)]
                 transition-colors duration-150">
                Editar Preferencias
            </a>
        </div>

        <!-- Seção: Suporte -->
        <div class="bg-[var(--bg)] rounded-md p-5 shadow flex justify-between items-start">
            <div>
                <h2 class="text-lg font-medium text-[var(--texto)]">Suporte</h2>
                <p class="mt-1 text text-gray-400">
                    Obter ajuda e suporte
                </p>
            </div>
            <a
                href="{{ route('suporte') }}"
                class="bg-[var(--primaria)] text-[var(--texto-botao)]
                 px-4 py-2 rounded-md shadow
                 hover:bg-[var(--secundaria)]
                 transition-colors duration-150">
                Ir para suporte
            </a>
        </div>
    </div>

</div>

@endsection
