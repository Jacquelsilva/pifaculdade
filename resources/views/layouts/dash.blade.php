<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ session('configuracao.tema', 'claro') }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>@yield('title')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital" rel="stylesheet" />
    <!-- Ícones -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <!-- JS -->
    <script src="{{ asset('js/javascript.js') }}"></script>
    @yield('styles')
    @yield('head-scripts')
</head>

<body>

    {{-- Menu --}}
    <nav>
        <a href="{{ route('contaconfig') }}">{{ __('mensagens.config') }}</a>
        <aside class="sidebar">
            <div class="menu-toggle"><i class="fas fa-bars"></i></div>
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}"><i class="fas fa-home"></i><span>Home</span></a></li>
                    <li><a href="{{ route('historico') }}"><i class="fas fa-history"></i><span>Histórico</span></a></li>
                    <li><a href="{{ route('configuracao') }}"><i class="fas fa-cog"></i><span>Configurações</span></a></li>
                    <li><a href="{{ route('dashboard') }}"><i class="fas fa-info-circle"></i><span>Relatórios</span></a></li>
                    <li><a href="{{ route('saibamais') }}"><i class="fas fa-info-circle"></i><span>Saiba mais</span></a></li>
                </ul>

                <div class="logout">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: inherit; padding: 0; display: flex; align-items: center;">
                            <i class="fas fa-sign-out-alt"></i>
                            <span style="margin-left: 5px;">Sair</span>
                        </button>
                    </form>
                </div>
            </nav>
        </aside>
    </nav>

    {{-- Conteúdo principal --}}

    @yield('content')


    <!-- <main class="min-h-screen flex justify-center">
        <section class="py-4 px-4 mx-auto max-w-screen-xl lg:py-10 lg:px-6 ">
        </section>
    </main> -->

    {{-- Rodapé padrão --}}
    @hasSection('footer')
    @yield('footer')
    @else
    <footer class="site-footer">
        <div class="footer-top">
            <p class="footer-copy">
                Copyright © {{ date('Y') }}
            </p>
        </div>
        <div class="footer-bottom">
            <p>
                Recora | (19) 3885-1923 • (19) 99269-1700 | Rua Dom Pedro I, 65 – Cidade Nova | CEP 13334-100
            </p>
        </div>
    </footer>
    @endif

    @yield('scripts')
</body>

</html>