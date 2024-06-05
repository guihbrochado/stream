<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\LogoComposer;
use Illuminate\Support\Facades\View;
use App\Models\Inicio;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     */
    public function register(): void {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        View::composer('components.nav', function ($view) {
            $inicio = Inicio::first();
            $view->with('inicio', $inicio);
        });
    }
}
