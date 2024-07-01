<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css'])
</head>

<body class="absolute left-0 top-0 grid min-h-full w-full place-items-center bg-zinc-300 p-5 dark:bg-zinc-900">
    <div id="app" class="grid w-full max-w-lg rounded-lg bg-zinc-200 px-2 shadow dark:bg-zinc-800">
        <header class="px-3 py-5 text-center">
            <span class="title text-3xl">
                Cima<span class="text-sky-600 dark:text-sky-400">CMS</span>
            </span>
        </header>

        <main class="border-y border-zinc-300 px-3 py-5 dark:border-zinc-900">
            {{ $slot }}
        </main>

        <footer class="px-3 py-5 text-center text-xs font-bold">
            &copy; {{ date('Y') }}
        </footer>
    </div>
</body>

</html>
