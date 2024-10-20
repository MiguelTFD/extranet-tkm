<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Comparte el usuario autenticado en todas las vistas
        // Usa View::composer para que la variable $user esté disponible después de la autenticación
        View::composer('*', function ($view) {
            $view->with('user', Auth::user());
        });
    }
}
