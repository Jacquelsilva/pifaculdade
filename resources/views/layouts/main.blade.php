<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Google  -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital" rel="stylesheet">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        
        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- JS -->
        <script src="{{ asset('js/javascript.js') }}"></script>
    </head>

    <body>
        @yield('content')

    @unless (isset($hideFooter) && $hideFooter)
    <footer class="site-footer">
      <div class="footer-top">
        <p class="footer-copy">
          Copyright ©
        </p>
        <div class="footer-social">
          <a href="#"><i class=""></i></a>
          <a href="#"><i class=""></i></a>
          <a href="#"><i class=""></i></a>
          <a href="#"><i class=""></i></a>
        </div>
      </div>
      <div class="footer-bottom">
        <p>
          Recora |
          (19) 3885-1923 • (19) 99269-1700 |
          Rua Dom Pedro I, 65 – Cidade Nova | CEP 13334-100
        </p>
      </div>
    </footer>
      
@endunless


    </body>
</html>

