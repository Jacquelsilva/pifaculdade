@extends('layouts.dash-container')

@section('title', __('mensagens.config'))

@section('content')
<div class="grid">

    <div class="max-w-screen-md mb-8 lg:mb-16">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-[var(--texto)]">{{ __('mensagens.preferencias') }}</h2>
        <p class="text-gray-500 sm:text-xl dark:text-gray-400">
            Personalize sua experiência: escolha tema, idioma e notificações com apenas um clique.
        </p>
    </div>

    @if(session('success'))
    <div style="padding: 1rem; background: #d4edda; color: #155724; border-radius: 4px; margin-bottom: 1rem;">
        {{ session('success') }}
    </div>
    @endif

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

    <div class="bg-[var(--bg)] rounded-md p-5 shadow flex justify-between items-start">
        <form method="POST" action="{{ route('contaconfig.salvarConta') }}" class="form-configuracoes w-full">
            @csrf
            <div id="configuracoes" class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="w-full">
                        <label for="password" class="block text-[var(--texto)] text-lg mb-1">
                            Senha
                        </label>
                        <input
                            required
                            id="password"
                            placeholder="Nova senha"
                            name="password"
                            type="password"
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
      " />

                    </div>

                    <div class="w-full">
                        <label for="selectIdioma" class="block text-[var(--texto)] text-lg mb-1">
                            Confirmar senha
                        </label>
                        <input
                            required
                            id="password-confirm"
                            name="password-confirm"
                            type="password"
                            placeholder="Confirme a senha"
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
      " />

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
                    Atualizar
                </button>
            </div>
        </form>
    </div>



</div>
@endsection