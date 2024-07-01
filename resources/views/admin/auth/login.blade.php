<x-layouts.auth>
    <h1 class="title text-2xl">Login</h1>

    <div class="pt-5">
        @error('authError')
            <p class="info-box mb-4" data-error>
                {{ $message }}
            </p>
        @enderror
        <form action="{{ rroute('admin.auth.auth') }}" method="post" novalidate>
            @csrf

            <div class="pb-5">
                <label for="login" class="block pb-2">E-Mail or Username</label>
                <input id="login" type="email" name="login" value="{{ old('login') }}" required class="input"
                    autocomplete="username" @error('login') data-error @enderror>

                @error('login')
                    <div class="input-message mt-2" data-error>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="pb-5">
                <label for="password" class="block pb-2">Password</label>
                <input id="password" type="password" name="password" required class="input"
                    autocomplete="current-password" @error('password') data-error @enderror>

                @error('password')
                    <div class="input-message mt-2" data-error>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="pb-5">
                <input id="remember" type="checkbox" name="remember" @checked(old('remember')) required>
                <label for="remember" class="select-none">Remember me</label>
            </div>

            <button type="submit" class="btn">
                Login
            </button>
        </form>
    </div>

    <div class="pt-5 text-center text-sm sm:text-right">
        <a href="{{ rroute('admin.auth.register') }}">
            <span class="whitespace-nowrap">Don't have an account yet?</span>
            <span class="whitespace-nowrap">Register here!</span>
        </a>
    </div>
</x-layouts.auth>
