<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mercury')</title>
    @php
        $manifestPath = public_path('build/manifest.json');
        $cssFile = null;
        if (file_exists($manifestPath)) {
            $manifest = json_decode(file_get_contents($manifestPath), true);
            $cssFile = $manifest['resources/css/app.css']['file'] ?? null;
        }
    @endphp
    @if ($cssFile)
        <link rel="stylesheet" href="{{ asset('build/' . $cssFile) }}">
    @else
        @vite('resources/css/app.css')
    @endif
</head>
<body class="page-dashboard">
    <div class="layout">
        <aside class="sidebar">
            <div class="window-dots">
                <span class="dot dot-red"></span>
                <span class="dot dot-yellow"></span>
                <span class="dot dot-green"></span>
            </div>
            <div class="brand">
                <img class="brand-logo" src="/images/image.png" alt="Mercury logo">
                <span class="brand-name">Mercury</span>
            </div>
            <div class="menu-title">Menu</div>
            <nav class="menu">
                <a class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="/dashboard">
                    <span class="icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M4 10.5l8-6 8 6V20a1 1 0 0 1-1 1h-4v-6H9v6H5a1 1 0 0 1-1-1v-9.5z"/>
                        </svg>
                    </span>
                    <span class="label">Dashboard</span>
                </a>
                <a class="menu-item {{ request()->routeIs('groups.*') ? 'active' : '' }}" href="{{ route('groups.index') }}">
                    <span class="icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M7 12a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm10 0a2.5 2.5 0 1 0-2.3-3.5 4.5 4.5 0 0 1 0 5A2.5 2.5 0 0 0 17 12zM3 20a4 4 0 0 1 4-4h2a4 4 0 0 1 4 4v1H3zm12 1v-1a5.8 5.8 0 0 0-1.7-4.1h2A4.7 4.7 0 0 1 20 20v1h-5z"/>
                        </svg>
                    </span>
                    <span class="label">Groups</span>
                </a>
                <a class="menu-item {{ request()->routeIs('contacts.*') ? 'active' : '' }}" href="{{ route('contacts.index') }}">
                    <span class="icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M4 6h16a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H7l-3 3V7a1 1 0 0 1 1-1zm2 3v2h12V9H6zm0 4v2h8v-2H6z"/>
                        </svg>
                    </span>
                    <span class="label">Contacts</span>
                </a>
            </nav>
        </aside>
        <main class="content">
            @if (session('success'))
                <div class="flash flash-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="flash flash-error">{{ session('error') }}</div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
