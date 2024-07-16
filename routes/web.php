<?php

declare(strict_types=1);

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/cms-admin')
    ->name('admin.')
    ->middleware('admin.redirect')
    ->group(function (): void {

        Route::controller(AuthController::class)
            ->name('auth.')
            ->middleware('guest')
            ->group(function (): void {

                Route::get('/register', 'register')->name('register');

                Route::post('/register', 'store')->name('store');

                Route::get('/login', 'login')->name('login');

                Route::post('/login', 'auth')->name('auth');

                Route::post('/logout', 'logout')
                    ->withoutMiddleware('guest')
                    ->middleware('auth')
                    ->name('logout');

            });

        Route::middleware('auth')->group(function (): void {

            Route::controller(DashboardController::class)->group(function (): void {

                Route::get('/dashboard', 'show')->name('dashboard');

            });

            Route::resource('users', UserController::class);

            Route::resource('pages', PageController::class)->except('show');

        });

        Route::get('/{foo?}')->where(['foo' => '.*']);

    });

Route::name('pages.show')->get('/{permalink?}', [PageController::class, 'show'])->where(['permalink' => '.*']);
