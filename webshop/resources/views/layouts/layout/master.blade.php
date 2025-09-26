<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('extra-css')
</head>
<body>
    <header>
        @yield('header')
    </header>

    <nav>
        @yield('navigation')
    </nav>

    <main>
        @yield('main-content')
    </main>

    <footer>
        @yield('footer', '© ' . date('Y') . ' Mijn Website')
    </footer>
</body>
</html> 