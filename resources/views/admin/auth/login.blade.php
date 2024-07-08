<x-layouts.auth>
    <h1 class="title text-2xl">Login</h1>

    <div class="pt-5">
        @error('authError')
            <p class="info-box mb-4" data-error>
                {{ $message }}
            </p>
        @enderror

        <x-forms.form route="admin.auth.auth" method="post" novalidate>
            <div class="pb-5">
                <x-forms.input name="login" label="E-Mail or Username" type="email" autocomplete="username" required />
            </div>

            <div class="pb-5">
                <x-forms.input name="password" label="Password" type="password" autocomplete="current-password"
                    required />
            </div>

            <div class="pb-5">
                <x-forms.switchbox name="remember" label="Remember me" />
            </div>

            <button type="submit" class="btn">
                Login
            </button>
        </x-forms.form>
    </div>

    <div class="pt-5 text-center text-sm sm:text-right">
        <a href="{{ route('admin.auth.register') }}">
            <span class="whitespace-nowrap">Don't have an account yet?</span>
            <span class="whitespace-nowrap">Register here!</span>
        </a>
    </div>
</x-layouts.auth>
