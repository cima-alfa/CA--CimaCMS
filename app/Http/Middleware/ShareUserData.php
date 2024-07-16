<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Services\CurrentUserData;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class ShareUserData
{
    public function __construct(private ?CurrentUserData $currentUserData) {}

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        View::share('currentUser', $this->currentUserData);

        return $next($request);
    }
}
