<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Auth\Request as AuthRequest;
use App\Http\Requests\User\StoreRequest;
use App\Repositories\UserRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(private UserRepository $userRepository) {}

    /**
     * Show the form for creating a new user.
     */
    public function register(): View
    {
        return view('admin.auth.register');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $this->userRepository->create($request->validated());

        return redirect()->route('admin.auth.login');
    }

    /**
     * Show the form for signing in a user.
     */
    public function login(): View
    {
        return view('admin.auth.login');
    }

    /**
     * Authenticate the specified user.
     */
    public function auth(AuthRequest $request): RedirectResponse
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard', absolute: false));
        }

        return back()->withErrors([
            'authError' => 'The provided credentials do not match our records.',
        ])->withInput($request->all(['login', 'remember']));
    }

    /**
     * Logout the authenticated user.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.auth.login');
    }
}
