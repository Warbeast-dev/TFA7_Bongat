<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="POS Foundations customer and user account directory.">
    <title>@yield('title', 'Home') | POS Foundations</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <a class="skip-link" href="#main">Skip to content</a>
    <header class="site-header">
        <div class="shell header-inner">
            <a class="brand" href="{{ route('home') }}"><span class="brand-mark">P</span><span>POS <strong>Foundations</strong></span></a>
            <nav aria-label="Main navigation">
                @foreach (['home' => 'Home', 'about' => 'About', 'customers.index' => 'Customers', 'users.index' => 'Users'] as $route => $label)
                    <a href="{{ route($route) }}" @if(request()->routeIs($route)) aria-current="page" @endif>{{ $label }}</a>
                @endforeach
            </nav>
        </div>
    </header>
    <main id="main" class="shell">
        @if (session('success'))
            <div class="flash success" role="status">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>
    <footer class="shell footer"><span>POS Foundations</span><span>Customer &amp; user account directory</span></footer>
</body>
</html>
