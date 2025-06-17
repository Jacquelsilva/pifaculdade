<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Define o idioma com base na sessão
        App::setLocale(Session::get('configuracao.idioma', 'pt'));
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
