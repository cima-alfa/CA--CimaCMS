<?php

namespace App\Providers;

use App\Services\CurrentUserData;
use Illuminate\Support\Facades\Blade;
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
        Password::defaults(function (): Password {
            return app()->isProduction()
                        ? Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()
                        : Password::min(3);
        });
    }
}
