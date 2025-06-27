<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class DefinirIdioma
{
    public function handle($request, Closure $next)
    {
        $idioma = Session::get('configuracao.idioma', 'pt');
        App::setLocale($idioma);
        dd('Idioma da sessão: ' . $idioma, 'Locale atual: ' . App::getLocale());
        return $next($request);
    }
}
