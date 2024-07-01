<x-layouts.auth>

    <h1 class="title text-2xl">Registration</h1>

    <div class="pt-5">
        <form action="{{ rroute('admin.auth.store') }}" method="post" novalidate>
            @csrf

            <div class="pb-5">
                <label for="username" class="block pb-2">Username</label>
                <input id="username" type="text" name="username" value="{{ old('username') }}" required class="input"
                    autocomplete="username" @error('username') data-error @enderror>

                @error('username')
                    <div class="input-message mt-2" data-error>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="pb-5">
                <label for="email" class="block pb-2">E-Mail</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required class="input"
                    autocomplete="email" @error('email') data-error @enderror>

                @error('email')
                    <div class="input-message mt-2" data-error>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="pb-5">
                <label for="password" class="block pb-2">Password</label>
                <input id="password" type="password" name="password" required class="input"
                    autocomplete="new-password" @error('password') data-error @enderror>

                @error('password')
                    <div class="input-message mt-2" data-error>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="pb-5">
                <label for="password_confirmation" class="block pb-2">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required class="input"
                    autocomplete="new-password" @error('password') data-error @enderror>
            </div>

            <div class="pt-2">
                <button type="submit" class="btn">
                    Register now
                </button>
            </div>
        </form>
    </div>

    <div class="pt-5 text-center text-sm sm:text-right">
        <a href="{{ rroute('admin.auth.login') }}">
            <span class="whitespace-nowrap">Already have an account?</span>
            <span class="whitespace-nowrap">Sign in here!</span>
        </a>
    </div>
</x-layouts.auth>
