<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <div id="app" class="layout-grid">
        <header class="layout-header flex items-center justify-between px-5">
            <h1 class="text-2xl">Admin</h1>
            <form action="{{ route('admin.auth.logout') }}" method="post">
                @csrf

                <button type="submit">Logout</button>
            </form>
        </header>

        <aside class="layout-aside">
            <nav class="primary-navigation">
                <ul>
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.pages.index') }}" class="nav-link">Pages</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link">Settings</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="layout-main p-5">
            {{ $slot }}
        </main>

        <footer class="layout-footer">

        </footer>
    </div>
</body>

</html>
