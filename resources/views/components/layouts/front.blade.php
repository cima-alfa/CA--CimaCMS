<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <div id="app">
        <header class="">
            <h1 class="text-5xl">Front</h1>

            <nav>
                <ul class="flex justify-end gap-x-3">
                    <li class="mr-auto"><a href="{{ rroute('pages.show') }}" class="p-2">Home</a></li>
                    <li><a href="{{ rroute('admin.auth.register') }}" class="p-2">Register</a></li>
                    <li><a href="{{ rroute('admin.auth.login') }}" class="p-2">Login</a></li>
                </ul>
            </nav>
        </header>

        <main>
            {{ $slot }}
        </main>

        <footer>

        </footer>
    </div>
</body>

</html>
