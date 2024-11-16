<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
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

        Carbon::setLocale('es');
        // Comparte el usuario autenticado en todas las vistas
        // recuerda usar el View::composer para que la variable $user este disponible despues de la autenticacin
        View::composer('*', function ($view) {
            $view->with('user', Auth::user());
        });
    }
}
