<?php

namespace App\Providers;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

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
        Debugbar::getJavascriptRenderer()
            ->addAssets(['debugbar.css'], [], resource_path('css'));

        Password::defaults(function (): Password {
            return app()->isProduction()
                        ? Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()
                        : Password::min(3);
        });
    }
}
