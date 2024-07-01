<?php

use App\Http\Middleware\AdminRedirect;
use App\Http\Middleware\ShareUserData;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        //commands: __DIR__.'/../routes/console.php',
        //health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectGuestsTo(fn() => route('admin.auth.login'));
        $middleware->redirectUsersTo(fn() => route('admin.dashboard'));

        $middleware->web(
            append: [ShareUserData::class]
        );

        $middleware->alias([
            'admin.redirect' => AdminRedirect::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {

    })->create();
